<?php

namespace App\Http\Controllers;

use App\Models\course;

use Illuminate\Http\Request;

class StudentKursMapController extends Controller
{
    //
    public function index(){
        $courses = course::all();
        return view('studentpages.course.index', compact('courses'));
    }
    public function show($id){
        $course = course::find($id);
        return view('studentpages.course.show', compact('course'));
    }
}
