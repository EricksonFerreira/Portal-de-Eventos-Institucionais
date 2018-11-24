<?php

namespace App\Http\Controllers;

use App\Atividade;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
       //Pega a model pelo id e coloca tudo que vem pelo request.
        $atividade = Atividade::find($id);
        /* Chamando o Provider AuthService*/
        /* Caso o dê erro na autorização da um break aki*/
        $this ->authorize('update-evento', $atividade);

       /*Teste:
        if(Gate::denies('update-post', $evento) )
            abort( 403, 'Unauthorized');
        */

        /*Pega a model pelo id e coloca tudo que vem pelo request.*/
        Atividade::find($id)->update($request->all());
        return view('editar-atividade', compact('atividade'));
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
