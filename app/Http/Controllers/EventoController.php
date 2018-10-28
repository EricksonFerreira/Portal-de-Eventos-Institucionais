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
			'descricao' => 'required',
			'email' => 'required|email',
			'email' => 'required|email',
			'telefone' => 'required',
		],
			//neste 2 array digo os indices e separando por um ponto
			//coloco a validação e neste indice coloco a mensagem que eu
			//quero que apareça
			[
				'nome.required' => 'Cala a boca e preenche o teu nome',
				'descricao.required' => 'Cala a boca e coloca uma descrição',
				'email.required' => 'Cala a boca e coloca o teu email',
				'email.email' => 'Bora meu irmão coloca um email válido',
				'telefone.required' => 'Bora meu irmão coloca o teu telefone',
			]);
		// O {{old()}} faz com que o que eu tenha digitado não venha ser perdido

		//dd é um var_dump do laravel, listando todos os itens preenchidos
		//dd($request->all());
		$Eventos	 			= new Evento;
		$Eventos->user_id 		= $request->user()->id;
		$Eventos->nome 			= $request->nome;
		$Eventos->descricao 	= $request->descricao;
		$Eventos->email 		= $request->email;
		$Eventos->telefone 		= $request->telefone;
		$Eventos->imagem 		= $request->imagem;
		$Eventos->vagas 		= $request->vagas;
		$Eventos->inicio_evento = $request->inicio_evento;
		$Eventos->fim_evento	= $request->fim_evento;
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
