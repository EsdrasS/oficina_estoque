<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Estoque;
use App\Venda;
use App\User;

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
    public function index()
    {
         $estoques = estoque::paginate(5);             
         $tipo = auth()->user()->tipo;
        $total = estoque::all()->count();
        return view('home', compact('estoques', 'total', 'tipo'));
    }
}
