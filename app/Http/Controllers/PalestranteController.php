<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Palestrante;
use Illuminate\Http\Request;

class PalestranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $evento = Evento::find($id);
        return view('criar-editar-palestrante', compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

    if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $numero = rand(1111,9999);
            $dir = "img/evento/palestrante";
            $ex = $imagem -> guessClientExtension();
            $nomeImagem = "imagem_".$numero.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
  
    $palestrante                    = new Palestrante;
    $palestrante->evento_id         = $request->evento;
    $palestrante->nome              = $request->nome;
    if (isset($nomeImagem)) {
    $palestrante->imagem            = $nomeImagem;
    }
    if (isset($request->descricao)) {
        $palestrante->descricao         = $request->descricao;
    }
    $palestrante->save();
    $idEvento = $request->evento;

    $request->session()->flash('alert-success', 'Palestrante cadastrada com sucesso!');
    return redirect(route('evento.show', ['id' => $idEvento]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Pega a model pelo id e coloca tudo que vem pelo request.
        $palestrante = Palestrante::find($id);
        $idEvento = $palestrante->evento_id;
        $evento = Evento::find($idEvento);
        return view('criar-editar-palestrante', compact('palestrante', 'evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $numero = rand(1111,9999);
            $dir = "img/evento/palestrante";
            $ex = $imagem -> guessClientExtension();
            $nomeImagem = "imagem_".$numero.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        $palestrante                    = Atividade::find($id);
        $palestrante->evento_id         = $request->evento;
        $palestrante->nome              = $request->nome;
        if (isset($nomeImagem)) {
            $palestrante->imagem        = $nomeImagem;
        }
        if (isset($request->descricao)) {
            $palestrante->descricao     = $request->descricao;
        }
        $palestrante->save();
        $idEvento = $request->evento;

        $request->session()->flash('alert-success', 'Palestrante atualizado com sucesso!');
        return redirect(route('evento.show', ['id' => $idEvento]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search($eventoId, $query) {
        //
        $palestrantes = Palestrante
            ::where('evento_id', $eventoId)
            ->where('nome', 'like', '%' . $query . '%')
            ->get();
        return json_encode(['items' => $palestrantes]);
    }
}
