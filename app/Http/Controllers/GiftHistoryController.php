<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\ShoppingHistory;
use Illuminate\Http\Request;

class GiftHistoryController extends Controller
{
    public function index()
    {
        $giftHistory = ShoppingHistory::orderBy('id', 'DESC')->get();
        return view('gifthisrory.index' , compact('giftHistory'));
    }

    public function giftHistoryShow($id)
    {
        $gift = Gift::find($id);
        return view('gifthisrory.show' , compact('gift'));

    }
    public function submitted($id)
    {
        $giftHistory = ShoppingHistory::find($id);
        $giftHistory->update([
            'submitted'=> 1
        ]);

        return redirect()->back();
    }


}
