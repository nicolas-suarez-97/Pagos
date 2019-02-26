<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function recibir(Request $request)
    {
      $user = User::where('name', $request->user()->name);
        return view('recibir',[
          'user' => $user
        ]);
    }

    public function enviar(Request $request)
    {
      $user = User::where('name', $request->user()->name);
        return view('enviar',[
          'user' => $user
        ]);
    }
}
