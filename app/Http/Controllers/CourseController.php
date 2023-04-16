<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursePatchRequest;
use App\Http\Requests\CoursePostRequest;
use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = course::all();
        $course_count = count($courses);
        return view('course.index',compact('courses','course_count'));
        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursePostRequest $request)
    {
        $create_course = course::create($request->input());
        if($create_course){
            return  back()->with('saccess' , 'Kurs Yaratildi  Gap Yo\'q');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = course::find($id);
        return view('course.edit' , compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //corse find id
        $course = course::find($id);
        if($course){
            $update = $course->update($request->input());

            $message =  Auth::user()->name . ' o\'zgarish muvaffaqiyatli tugallandi ';
            if($update){
            return redirect()->route('course.index')->with('update_success' , $message );
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        $course = course::find($id);
        if($course){
            $course->delete();
            $message = $course->full_name . ' ' .' Kurs O\'chirildi';
            return back()->with('deleteCourse' , $message);
        }
}
}
