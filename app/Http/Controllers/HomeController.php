<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\mentor;

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
    $user = Auth::user()->role;
    if($user == 'admin'){
        return view('dashboard' );
    }elseif($user == 'mentor'){
        $mentor_id = Auth::user()->role_id;
        $mentor = mentor::where('id' , $mentor_id)->first();
        $group = group::where('mentor_id' ,$mentor->id )->get();
        return view('mentorpages.dashboard' , compact('group') );
    }
    }
    public function mentor_page(){

        return view('mentorpages.dashboard' );
    }
}
