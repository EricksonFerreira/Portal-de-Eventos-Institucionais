<?php

namespace App\Http\Controllers;

use App\Evento;
use App\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Http\UploadedFile;

class EventoController extends Controller {

	 public function __construct(){
    /*Nesse caso o middleware auth será aplicado a todos os métodos*/
    /*Com isso só pode acessar as paginas caso esteja logado exceto a index*/
        $this->middleware('auth')->except('index');

    }
	public function index() {
		/*Pega todos os itens da model Evento e leva para a index*/
		//$Eventos 	= Evento::all(); 
		$Eventos 	= Evento::all();
		$Users 		= User::all();
		$Total 		= Evento::all()->count();
		return view('index', compact('Eventos', 'Total', 'Users '));
	}
	public function create() {
		/*Redireciona para a View de criar evento*/
		return view('criar-evento');
	}

	public function store(Request $request) {
		/*validando os dados
		pego o request com as validações e coloco dentro da variavel
		mando um request com o método validate
		com os indices e o que eu quero que seja validado*/
		$validar 			= 	$request->validate([
			'nome' 			=> 'required',
			'descricao'		=> 'required',
			'email' 		=> 'required|email',
			'telefone' 		=> 'required',
			'imagem' 		=> 'required',
			'vagas' 		=> 'required',
			'campus' 		=> 'required',
		],
			/*neste 2 array digo os indices e separando por um ponto
			coloco a validação e neste indice coloco a mensagem que eu
			quero que apareça*/
			[
			'nome.required' 		=> 'preenche o seu nome',
			'descricao.required' 	=> 'coloque uma descrição',
			'email.required' 		=> 'coloque um email',
			'email.email'			=> 'coloque um email válido',
			'telefone.required' 	=> 'coloque o seu telefone',
			'imagem.required' 		=> 'coloque uma imagem',
			'vagas.required' 		=> 'coloque o numero de vagas',
			'Campus.required' 		=> 'Coloque um campus',
			]);
		/*O {{old()}} faz com que o que eu tenha digitado não venha ser perdido

		dd é um var_dump do laravel, listando todos os itens preenchidos
		dd($request->all());*/

		/*Cadastrando imagens no banco*/
		// Verifica se informou o arquivo e se é válido

    		$imagem = $request->imagem;
    		// ob_start();
    		// file_put_contents('/tmp/dump', ob_get_clean());
    		// exit();
    
    	if($request->hasFile('imagem')){
    		$imagem = $request->file('imagem');
    		$numero = rand(1111,9999);
    		$dir = "img/evento/";
    		$ex = $imagem -> guessClientExtension();
    		$nomeImagem = "imagem_".$numero.".".$ex;
    		$imagem->move($dir,$nomeImagem);
    		$dados['imagem'] = $dir."/".$nomeImagem;
    	}else{
    		$request->session()->flash('alert-success', 'Não existe imagem!');
			return redirect('/evento');
    	}	
 
		/*Atualizando todos esses itens da model*/
		$Eventos	 				= new Evento;
		$Eventos->user_id 			= $request->user()->id;
		$Eventos->nome 				= $request->nome;
		$Eventos->descricao 		= $request->descricao;
		$Eventos->campus 			= $request->campus;
		$Eventos->email 			= $request->email;
		$Eventos->telefone 			= $request->telefone;
		$Eventos->imagem 			= $nomeImagem;
		$Eventos->vagas 			= $request->vagas;
		$Eventos->inicio_evento		= $request->inicio_evento;
		$Eventos->hora_inicio		= $request->hora_inicio;
		$Eventos->fim_evento		= $request->fim_evento;
		$Eventos->hora_fim			= $request->hora_fim;
		$Eventos->save();

    		 //var_dump($Eventos);
		
		$request->session()->flash('alert-success', 'Evento cadastrado com sucesso!');
		return redirect('/evento');
	}
	public function show($id) {
		//
	}

	public function edit($id) {
		/*Redireciona para o View editar com todos os dados do evento selecionado*/
		$evento = Evento::find($id);
		return view('editar-evento', compact('evento'));
	}

	public function update(Request $request, $id) {
		/*Pega a model pelo id e coloca tudo que vem pelo request.*/
		Evento::find($id)->update($request->all());
		return redirect('/evento');
	}

	public function destroy($id) {
		/*Pega o item pelo id e destroi*/
		$Eventos = Evento::find($id);
		$Eventos->delete();
		return redirect('/evento');
	}
	/*Treinamento*/
	public function participar() {
		$city = Evento::where('nome', 'Erickson')->get()->first();
		echo $city->nome;
	}
}

/*https://stackoverflow.com/questions/50349775/laravel-unique-validation-on-multiple-columns*/