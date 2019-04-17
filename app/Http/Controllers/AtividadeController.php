<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Atividade;
use App\Palestrante;
use Illuminate\Http\Request;

class AtividadeController extends Controller
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
        return view('criar-editar-atividade', compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Falta adicionar o palestrante

        if($request->confirmacao == ''){
            $dataForm = 0;
        }else{
            $dataForm = 1;
        }
        $palestrante = Palestrante::where('nome', $request->palestrante);
       	$atividade	 				  = new Atividade;
        $atividade->palestrante_id    = $palestrante->id;
        $atividade->evento_id         = $request->evento;
        $atividade->titulo            = $request->titulo;
        $atividade->descricao         = $request->descricao;
        $atividade->confirmacao       = $dataForm;
        $atividade->hora_inicio       = $request->hora_inicio;
        $atividade->hora_fim          = $request->hora_fim;
        $atividade->save();
        $idEvento = $request->evento;

        $request->session()->flash('alert-success', 'Atividade cadastrada com sucesso!');
        return redirect(route('evento.show', ['id' => $idEvento]));
        $atividade->hora_inicio       = $request->hora_inicio;
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
		$atividade = Atividade::find($id);
        $idEvento = $atividade->evento_id;
        $evento = Evento::find($idEvento);
        return view('criar-editar-atividade', compact('atividade', 'evento'));
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
        if($request->confirmacao    == ''){
            $dataForm = 0;
        }else{
            $dataForm = 1;
        }
        // $palestrante = Palestrante::where('nome', $request->palestrante);
        $palestrante_id = $request->palestrante_id ?? 0;
        if ($palestrante_id == 0 || $palestrante_id == '') {
            // inserir em Palestrante
            $createPalestrante              = new Palestrante;
            $createPalestrante->evento_id   = $request->evento;
            $createPalestrante->nome        = $request->palestrante;
            $createPalestrante->save();

            $id_palestrante = Palestrante::count();
            $palestrante_id = $id_palestrante;
        }
        $atividade                    = Atividade::find($id);
        $atividade->palestrante_id    = $palestrante_id;
        $atividade->evento_id         = $request->evento;
        $atividade->titulo            = $request->titulo;
        $atividade->descricao         = $request->descricao;
        $atividade->confirmacao       = $dataForm;
        $atividade->hora_inicio       = $request->hora_inicio;
        $atividade->hora_fim          = $request->hora_fim;
        $atividade->save();
        $idEvento = $atividade->evento_id;

        $request->session()->flash('alert-update', 'Atividade Atualizado com sucesso!');
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
        /*Pega o item pelo id e destroi*/
        $atividade = Atividade::find($id);
        $atividade->delete();
        return redirect(route('evento.show', ['id' => $atividade->evento_id]));  
    }
}
