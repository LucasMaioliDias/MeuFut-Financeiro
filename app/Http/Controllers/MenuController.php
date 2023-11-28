<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Finance;


class MenuController extends Controller
{
    public function index()
    {
       
        $userId = auth()->id();

        $finances = Finance::where('user_id', $userId)->get();
        $positive = Finance::where('user_id', $userId)->where('type', 1)->sum('value');
        $negative = Finance::where('user_id', $userId)->where('type', 2)->sum('value');
        $saldo = $positive - $negative;

        return view('menu', ['finances' => $finances, 'positive' => $positive, 'negative' => $negative, 'saldo' => $saldo]);
    }



    public function store(Request $request)
    {
        $FinanceData = $request->validate([
            'type' => 'required',
            'description' => 'required',
            'value' => 'required|numeric',
        ]);

        $finance = Finance::create([
            'description' => $FinanceData['description'],
            'type' => $FinanceData['type'],
            'value' => $FinanceData['value'],
            'user_id' => auth()->id(),
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


    public function destroy(int $financeId)
    {
        Finance::destroy($financeId);

        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\finance  $financeId
     * @return \Illuminate\Http\Response
     */
}
