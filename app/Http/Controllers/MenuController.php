<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Finance;


class MenuController extends Controller
{
    public function index()
    {
        //$userId = Auth::id();
        // $Menu = Menu::where('user_is',$userId)->ordeByDesc('created_at')->get();
       // return view('menu'); //->with('Menu', $Menu);
        $finances = Finance::all(); 
        return view('menu', ['finances' => $finances]);
    }



    public function store(Request $request)
    {
        $FinanceData = $request->validate([
            'tipo' => 'required',
            'valor' => 'required|numeric',
        ]);

        $finance = Finance::create([
            'tipo' => $FinanceData['tipo'],
            'valor' => $FinanceData['valor'],

        ]);

        $finance->save();

         return redirect('/menu');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
}
