<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user_id = Auth::id();
        $conta = Conta::where('user_id',$user_id)->first();
        return view('home',['conta'=> $conta]);
    }

    public function sacar()
    {
        $user_id = Auth::id();
        $conta = Conta::where('user_id',$user_id)->first();
        $valor_saque = (float)$_POST['valor'];
        
        if($valor_saque <= (float)$conta->saldo){
            $novo_saldo = $conta->saldo - $valor_saque;
            $conta->update(['saldo' => $novo_saldo]);
            return redirect()->route('home');
        }
        
        return redirect()->route('home',['acao'=>'saque','erro'=>'Não é possível sacar essa quantia. Saldo insuficiente']);
    }

    public function depositar()
    {
        $user_id = Auth::id();
        $conta = Conta::where('user_id',$user_id)->first();
        $deposito = (float)$_POST['valor'];
        $novo_saldo = (float)$conta->saldo + $deposito;
        $conta->update(['saldo' => $novo_saldo]);
        return redirect()->route('home');
    }
}
