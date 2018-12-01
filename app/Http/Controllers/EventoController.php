<?php

namespace App\Http\Controllers;

use App\Evento;
use App\ParticiparEvento;
use App\Atividade;
use App\Palestrante;
use App\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Http\UploadedFile;

class EventoController extends Controller {

	 public function __construct(){
    /*Nesse caso o middleware auth será aplicado a todos os métodos*/
    /*Com isso só pode acessar as paginas caso esteja logado exceto a index*/
        $this->middleware('auth')->except('index','show');
    }
	public function index() {
		/*Pega todos os itens da model Evento e leva para a index*/
		//$eventos 	= Evento::all();
		$eventos 	= Evento::where('fim_evento', '>=', date('Y-m-d'))->orderBy('inicio_evento', 'asc')->get();
		$past 	  = Evento::where('fim_evento', '<', date('Y-m-d'))->orderBy('inicio_evento', 'desc')->get();
		$users 		= User::all();
		$total 		= Evento::all()->count();
		return view('index', compact('eventos', 'total', 'users', 'past'));
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
			// 'email' 		=> 'email',
			'telefone' 		=> 'required',
			// 'imagem' 		=> 'required',
			'vagas' 		=> 'required',
			'campus' 		=> 'required',
		],
			/*neste 2 array digo os indices e separando por um ponto
			coloco a validação e neste indice coloco a mensagem que eu
			quero que apareça*/
			[
			'nome.required' 		=> 'preenche o seu nome',
			'descricao.required' 	=> 'coloque uma descrição',
			// 'email.required' 		=> 'coloque um email',
			'email.email'			=> 'coloque um email válido',
			'telefone.required' 	=> 'coloque o seu telefone',
			// 'imagem.required' 		=> 'coloque uma imagem',
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

    	$nomeImagem = null;
    	if($request->hasFile('imagem')){
    		$imagem = $request->file('imagem');
    		$numero = rand(1111,9999);
    		$dir = "img/evento/";
    		$ex = $imagem -> guessClientExtension();
    		$nomeImagem = "imagem_".$numero.".".$ex;
    		$imagem->move($dir,$nomeImagem);
    		$dados['imagem'] = $dir."/".$nomeImagem;
    	}

		/*Atualizando todos esses itens da model*/
		$eventos	 				= new Evento;
		$eventos->user_id 			= $request->user()->id;
		$eventos->nome 				= $request->nome;
		$eventos->descricao 		= $request->descricao;
		$eventos->campus 			= $request->campus;
		$eventos->email 			= $request->email;
		$eventos->telefone 			= $request->telefone;
		$eventos->imagem 			= $nomeImagem;
		$eventos->vagas 			= $request->vagas;
		$eventos->inicio_evento		= $request->inicio_evento;
		$eventos->hora_inicio		= $request->hora_inicio;
		$eventos->fim_evento		= $request->fim_evento;
		$eventos->hora_fim			= $request->hora_fim;
		$eventos->save();

    		 //var_dump($eventos);

		$request->session()->flash('alert-success', 'Evento cadastrado com sucesso!');
		return redirect('/evento');
	}

	public function show($id) {

		$eventos = Evento::find($id);
		$palestrante = Palestrante::where('evento_id', '=', $id)->get();
		$atividades = Atividade::with('palestrante')->where('evento_id', '=', $id)->get();
		$user = User::where('id', '=', $palestrante);
		$participantes = count(ParticiparEvento::where('evento_id', '=', $id)->get());
		$participa = ParticiparEvento::where('evento_id', '=', $id)->get();
		$QuantVagas = $eventos->vagas - $participantes;
		$c = 0;

		return view('show', compact('eventos', 'participantes', 'QuantVagas', 'participa', 'c', 'palestrante', 'atividades', 'past'));
	}

	public function edit($id) {
		/*Redireciona para o View editar com todos os dados do evento selecionado*/
		$eventos = Evento::find($id);
		return view('editar-evento', compact('eventos'));
	}

	public function update(Request $request, $id) {
				/*validando os dados
		pego o request com as validações e coloco dentro da variavel
		mando um request com o método validate
		com os indices e o que eu quero que seja validado*/
		$validar 			= 	$request->validate([
			'nome' 			=> 'required',
			'descricao'	=> 'required',
			'email' 		=> 'email',
			'telefone' 	=> 'required',
			//'imagem' 	=> 'required',
			'vagas' 		=> 'required',
			'campus' 		=> 'required',
		],
			/*neste 2 array digo os indices e separando por um ponto
			coloco a validação e neste indice coloco a mensagem que eu
			quero que apareça*/
			[
			'nome.required' 		=> 'preenche o seu nome',
			'descricao.required' 	=> 'coloque uma descrição',
			//'email.required' 		=> 'coloque um email',
			'email.email'			=> 'coloque um email válido',
			'telefone.required' 	=> 'coloque o seu telefone',
			//'imagem.required' 		=> 'coloque uma imagem',
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
    	}

		/* Pega tudo pelo id do item no Evento e altera*/
	  $eventos		 						= Evento::find($id);
		$eventos->user_id 			= $request->user()->id;
		$eventos->nome 					= $request->nome;
		$eventos->descricao 		= $request->descricao;
		$eventos->campus 				= $request->campus;
		$eventos->email 				= $request->email;
		$eventos->telefone 			= $request->telefone;
			if(isset($nomeImagem)){
				$eventos->imagem 				= $nomeImagem;
			}
		$eventos->vagas 				= $request->vagas;
		$eventos->inicio_evento	= $request->inicio_evento;
		$eventos->hora_inicio		= $request->hora_inicio;
		$eventos->fim_evento		= $request->fim_evento;
		$eventos->hora_fim			= $request->hora_fim;
		$eventos->save();

		$request->session()->flash('alert-update', 'Evento Atualizado com sucesso!');
		return redirect(route('evento.show', ['id' => $id]));
	}

	public function destroy($id) {
		/*Pega o item pelo id e destroi*/
		$eventos = Evento::find($id);
		$eventos->delete();
		return redirect('/evento');
	}

	public function myEvent($id) {
		/*Pega o item pelo id */
		// $eventos = User::find($id);

		// $eventos = Evento::where('user_id', '=', $id)->get();
		$eventos 	= Evento::where('fim_evento', '>=', date('Y-m-d'))->where('user_id', '=', $id)->orderBy('inicio_evento', 'asc')->get();
		$past 	  = Evento::where('fim_evento', '<', date('Y-m-d'))->orderBy('inicio_evento', 'desc')->get();
		return view('index', compact('eventos','past'));
	}

	/*Gerenciamento do Evento para ver quem está participando*/
	public function gerenciaEvento($id) {
		
		$evento = Evento::find($id);
		// $participantes = ParticiparEvento::where('evento_id', $id)->get();

		$participantes = ParticiparEvento::where('evento_id', '=', $evento->id)->get();


		return view('gerencia-evento' ,compact('evento', 'participantes'));
	}

	public function checking($id) {
		$participante		 				= ParticiparEvento::find($id);
			if ($participante->checking == 0) {
			$participante->checking = 1;
			}else{
			$participante->checking = 0;
			}
		$participante->user_id = $participante->user_id; 
		$participante->evento_id = $participante->evento_id; 
		$participante->role = $participante->role; 
		$participante->save();
	
			return redirect("/evento/{$participante->evento_id}/gerenciaevento");
	}
}

/*https://stackoverflow.com/questions/50349775/laravel-unique-validation-on-multiple-columns*/