<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttenceStudent extends Controller
{
    //
    public function index(){
        $attendance = Attendance::orderBy('id','desc')->where('student_id',Auth::user()->role_id)->get();
        $yesCount = Attendance::where('no' , "bor")->where('student_id' , Auth::user()->role_id)->count();
        $noCount = Attendance::where('no' , "yo'q")->where('student_id' , Auth::user()->role_id)->count();
        return view('studentpages.attendance.index', compact('attendance' , 'noCount' , 'yesCount'));
    }
}
