<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function index() {
        //$userId = Auth::id();
       // $Menu = Menu::where('user_is',$userId)->ordeByDesc('created_at')->get();
        return view('menu');//->with('Menu', $Menu);
    }

    public function finance(Request $request) {
        $tipo = $request->input('tipo');
        $valor = $request->input('valor');
    
        if (!is_numeric($valor)) {
            return redirect()->back()->with('error', 'Por favor, insira um valor numérico válido.');
        }
    
        $lucro = Session::get('lucro', 0);
        $despesas = Session::get('despesas', 0);
        $receita = Session::get('receita', 0);
    
        
        if ($tipo === 'Despesas' || $valor < 0) {
            $despesas += $valor;
        } elseif ($tipo === 'Receita') {
            $receita += $valor;
        } else {
            $lucro += $valor;
        }
    
        $saldo = $lucro + $receita + $despesas;

        Session::put('lucro', $lucro);
        Session::put('despesas', $despesas);
        Session::put('receita', $receita);
        Session::put('saldo', $saldo);
    
        return redirect()->back()->with('success', 'Registro realizado com sucesso!');
    }
    
}
