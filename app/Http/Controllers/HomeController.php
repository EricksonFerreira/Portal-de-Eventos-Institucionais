<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\ParticiparEvento;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*Só pega se algum usuario esteja logado (Autenticação)*/
        $this->middleware('auth')->except('upando');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return redirect('evento');
    }
    /*Essa função serve para se o usuario estive on ele poder editar os evento que ele criou*/
    public function update(Request $request,$id) {
        //Pega a model pelo id e coloca tudo que vem pelo request.
        $evento = Evento::find($id);
        /* Chamando o Provider AuthService*/
        /* Caso o dê erro na autorização da um break aki*/
        $this ->authorize('update-evento', $evento);

       /*Teste:
        if(Gate::denies('update-post', $evento) )
            abort( 403, 'Unauthorized');
        */

        /*Pega a model pelo id e coloca tudo que vem pelo request.*/
        Evento::find($id)->update($request->all());
        return view('editar-evento', compact('evento'));
    }
     public function participar(Request $request, $id) {
        $participar                    = new ParticiparEvento;
        $participar->user_id           = $request->user()->id;
        $participar->evento_id         = $id;
        $participar->checking          = false;
        $participar->save();

        $User = $request->user()->id;
        /*Pega a model pelo id e coloca tudo que vem pelo request.
        $evento = Evento::find($id)->update($request->all());
        */
        return redirect(route('evento.show', ['id' => $id]));
    }
    public function destroyParticipante($id) {
        /*Pega o item pelo id e destroi*/
        $participante = ParticiparEvento::find($id);
        $idEvento = $participante->evento_id;
        $participante->delete();

        return redirect(route('evento.show', ['id' => $idEvento]));    
    }
    public function atualizar(Request $request, $id) {
        if ($request->password != $request->password1) {
            return false;
        }


                /*validando os dados*/
        $validar            =   $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
            // 'imagem'        => 'required',
            'role'          => 'required',
            'cpf'           => 'required|numeric',
            'telefone'      => 'numeric|min:10',
        ],
            [
            'name.required'         => 'Preencha o seu nome',
            'email.required'        => 'Coloque um email',
            'email.email'           => 'Coloque um email válido',
            'password.required'    => 'Coloque uma senha',
            // 'imagem.required'        => 'coloque uma imagem',
            'role.required'         => 'Escolha uma função',
            'cpf.required'          => 'Digite seu CPF',
            'cpf.numeric'           => 'Utilize apenas numeros no campo CPF',
            // 'telefone.required'  => 'Coloque o seu telefone',
            'telefone.numeric'      => 'Digite apenas numeros no telefone',
            'telefone.min'          => 'Coloque uma quantidade de digitos de telefone válido',
            ]);
        
        $imagem = $request->imagem;
        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $numero = rand(1111,9999);
            $dir = "img/evento/";
            $ex = $imagem -> guessClientExtension();
            $nomeImagem = "imagem_".$numero.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        /* Altera as Informações do Usuario */
        $user                    = User::find($id);
        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->password          = $request->password;
        // if(isset($nomeImagem)){
        //     $user->imagem        = $nomeImagem;
        // }
        $user->role              = $request->role;
        $user->cpf               = $request->cpf;
        $user->telefone          = $request->telefone;
        $user->save();

        $request->session()->flash('alert-update', 'Evento Atualizado com sucesso!');
        return redirect(route('evento.index'));
    }
}
