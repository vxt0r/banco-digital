<?php

namespace App\Http\Controllers;

date_default_timezone_set('America/Sao_Paulo');

use App\Models\Conta;
use App\Models\Despesa;
use App\Models\Log;
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
        $account = Conta::where('user_id',$user_id)->first();
        return view('home',['account'=> $account]);
    }

    public function expenseControl()
    {
        $user_id = Auth::id();
        $account = Conta::where('user_id',$user_id)->first();
        $expenses = Despesa::where('user_id',$user_id)->get();
        return view('expense_control',['account'=> $account,'expenses'=>$expenses]);   
    }

    public function logs()
    {
        $user_id = Auth::id();
        $account = Conta::where('user_id',$user_id)->first();
        $logs = Log::where('conta_id',$account->id)->orderBy('data_hora','desc')->get();
        return view('logs',['logs'=>$logs]);
    }

    public function withdraw(Request $request)
    {
        $request->validate(['valor' => 'numeric'],['numeric' => 'Informe um valor válido']);
        $user_id = Auth::id();
        $account = Conta::where('user_id',$user_id)->first();
        $withdraw_value = $request->valor;
        
        if($withdraw_value <= (float)$account->saldo){
            $new_balance = $account->saldo - $withdraw_value;
            $account->update(['saldo' => $new_balance]);
            $this->createLog($account,'saque');
            return redirect()->route('home');
        }
        
        return redirect()->route('home',['acao'=>'saque','erro'=>'Não é possível sacar essa quantia. Saldo insuficiente']);
    }

    public function deposit(Request $request)
    {
        $request->validate(['valor' => 'numeric'],['numeric' => 'Informe um valor válido']);
        $user_id = Auth::id();
        $account = Conta::where('user_id',$user_id)->first();
        $deposit = $request->valor;
        $new_balance = (float)$account->saldo + $deposit;
        $account->update(['saldo' => $new_balance]);
        $this->createLog($account,'depósito');

        return redirect()->route('home');
    }

    public function addExpense(Request $request)
    {
        Despesa::create([
            'despesa' => $request->despesa,
            'valor' => $request->valor,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('despesa');
    }

    public function removeExpense(string $id)
    {
        $expense = Despesa::find($id);
        $expense->delete();
        return redirect()->route('despesa');
    }

    private function createLog(Conta $account,string $action): void
    {
        Log::create([
            'acao' => $action,
            'valor' => $_POST['valor'],
            'data_hora'=> date('Y/d/m H:i'),
            'conta_id' => $account->id
        ]);
    }

    
}
