<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Auth;

class StudentDataController extends Controller
{
    //
    public function index(){
        $id = Auth::user()->role_id;
        $student = student::where('id', $id)->first();
        return view('studentpages.user.index', compact('student'));
    }
}
