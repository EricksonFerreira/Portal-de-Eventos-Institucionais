<?php
namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;


class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$Eventos = Evento::all();
		$Total = Evento::all()->count();
		return view('index', compact('Eventos', 'Total'));	}
}
