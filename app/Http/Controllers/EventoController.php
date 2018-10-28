<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller {

	 public function __construct(){
        // Nesse caso o middleware auth será aplicado a todos os métodos
        $this->middleware('auth')->except('index');

    }
	public function index() {
		$Eventos = Evento::all();
		$Total = Evento::all()->count();
		return view('index', compact('Eventos', 'Total'));
	}
	public function create() {
		return view('criar-evento');
	}

	public function store(Request $request) {
		//validando os dados
		//pego o request com as validações e coloco dentro da variavel
		//mando um request com o método validate
		//com os indices e o que eu quero que seja validado
		$validar = $request->validate([
			'nome' => 'required',
			'email' => 'required|email',
			'site' => 'required',
			'descricao' => 'required',
		],
			//neste 2 array digo os indices e separando por um ponto
			//coloco a validação e neste indice coloco a mensagem que eu
			//quero que apareça
			[
				'nome.required' => 'Cala a boca e preenche o teu nome',
				'email.required' => 'Cala a boca e coloca o teu email',
				'email.email' => 'Bora meu irmão coloca um email válido',
				'site.required' => 'Cala a boca coloca o teu site',
				'descricao.required' => 'Cala a boca e coloca uma descrição',
			]);
		// O {{old()}} faz com que o que eu tenha digitado não venha ser perdido

		//dd é um var_dump do laravel, listando todos os itens preenchidos
		//dd($request->all());
		$Eventos = new Evento;
		$Eventos->nome = $request->nome;
		$Eventos->email = $request->email;
		$Eventos->site = $request->site;
		$Eventos->descricao = $request->descricao;
		$Eventos->user_id = $request->user()->id;
		$Eventos->save();

		return redirect('/evento');}

	public function show($id) {
		//
	}

	public function edit($id) {
		$evento = Evento::find($id);
		return view('editar-evento', compact('evento'));
	}

	public function update(Request $request, $id) {
		//Pega a model pelo id e coloca tudo que vem pelo request.
		Evento::find($id)->update($request->all());
		return redirect('/evento');
	}

	public function destroy($id) {
		$Eventos = Evento::find($id);
		$Eventos->delete();
		return redirect('/evento');
	}
}
