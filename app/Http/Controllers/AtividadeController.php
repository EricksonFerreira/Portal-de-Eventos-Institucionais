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
    public function create(Request $id)
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
    	$dataForm = $request->confirmacao;
        $dataForm = ( $dataForm['confirmacao'] == '') ? 0 : 1;

       	$atividade	 				= new Atividade;
		$atividade->palestrante_id 	= $request->user()->id;
		$atividade->evento_id 		=  8;
		$atividade->titulo 			= $request->titulo;
		$atividade->descricao 		= $request->descricao;
		$atividade->confirmacao 	= $dataForm;
		$atividade->hora_inicio		= $request->hora_inicio;
		$atividade->hora_fim		= $request->hora_fim;
		$atividade->save();
		$request->session()->flash('alert-success', 'Evento cadastrado com sucesso!');
    	return redirect(route('evento.show', ['id' => 8]));
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
    	$atividade = Atividade::find($id);
		Atividade::find($id)->update($request->all());

		$evento = $atividade->evento_id;
		return redirect(route('evento.show', ['id' => $evento]));
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
        return redirect('/');  
    }
}
