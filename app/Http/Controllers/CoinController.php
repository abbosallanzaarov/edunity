<?php

namespace App\Http\Controllers;

use App\Models\CoinManagment;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function index(){
        $coin = CoinManagment::first();
        // dd($coin);
        return view('coin.index',compact('coin'));
    }
    public function updateCoin( Request  $request ){
        $coin = CoinManagment::first();
        $coin->update($request->input());
        return redirect()->back();
    }
}
