<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\ShoppingHistory;
use App\Models\student;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index()
    {
        $gifts = Gift::all();
        return view('studentpages.shopping.index', compact('gifts'));
    }
    public function redirectShop(){

    }
    public function productShow($id , Request  $request)
    {
        // dd($id);
        $gift = Gift::find($id);
        $student = student::where('id' , Auth::user()->role_id)->first();
        if($gift->coin > $student->balans){
            return redirect()->back()->with( 'coin_message','Siznig Coin kamlik qiladi iltimos yaxshiroq o\'qing');
        }else{
            $student->update([
                'balans' => $student->balans - $gift->coin
            ]);
            ShoppingHistory::create([
                'student_id' =>  $student->id,
                'gift_id' =>     $gift->id,
                'coin' =>        $gift->coin,
                'submitted' =>   0
            ]);
            $request->session()->put('coin', $student->balans);

            return redirect()->back()->with( 'coin_success','Siz Sovg\'angiz dars vaqti topshiriladi');
        }

    }

}
