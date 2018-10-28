<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return redirect('evento');
    }
    public function update(Request $request,$id) {
        //Pega a model pelo id e coloca tudo que vem pelo request.
        $evento = Evento::find($id);
        $this ->authorize('update-evento', $evento);


       /* if(Gate::denies('update-post', $evento) )
            abort( 403, 'Unauthorized');
            */
        Evento::find($id)->update($request->all());
        return view('editar-evento', compact('evento'));
    }
     public function upando(Request $request, $id) {
        //Pega a model pelo id e coloca tudo que vem pelo request.
        Evento::find($id)->update($request->all());
        return redirect('/evento');
    }
}
