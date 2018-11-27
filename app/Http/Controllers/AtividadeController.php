<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Evento;
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
       	$atividade	 				= new Atividade;
        $atividade->palestrante_id    = 2;
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

        return view('criar-editar-atividade', compact('atividade'));
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
        $atividade                    = Atividade::find($id);
        $atividade->palestrante_id    = 2;
        $atividade->evento_id         = $atividade->evento_id;
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
