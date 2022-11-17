<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\group;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\course;
use App\Models\Team;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        $team = Team::select('id' , 'name')->get();
        $course = course::select('id' , 'full_name')->get();


        return view('student.index', compact('students' , 'team' , 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $uploaded = $request->file('image');
        if ($uploaded) {
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            $new_name = rand(100, 999) . time() . 'image.' . $tmp_name;
            $move_path = $uploaded->move(public_path('images/student/'), $new_name);
            $database_save_name = "images/student/" . $new_name;
            $student_email = $request->email;
            $users = User::all();
            foreach ($users as  $user) {
                # user email find
                if($user->email == $student_email){
                    return redirect('student')->with('message', 'bu email mavjud iltimos tekshiring');
                }
            }
            $mentor_default_image = 'fotomanuser.png';
            //mentor create
            if ($move_path) {
                $store = student::create(
                    [
                        'full_name' => $request->full_name,
                        'phone' =>$request->phone,
                        'group_id' => $request->group_id,
                        'course_id' => $request->course_id,
                        'image' => $database_save_name ?? $mentor_default_image ,
                        'email' => $request->email,
                        'password' => $request->password
                    ]
                );
                if ($store) {
                    //mentor id get All
                    $user_id = student::orderBy('id', 'desc')->first();
                    //user column create
                    $user_role = 'student';
                    $store = User::create(
                        [
                            'name' => $request->full_name,
                            'email' => $request->email,
                            'password' =>Hash::make($request->password),
                            'role' => $user_role,
                            'user_image'=>$database_save_name ?? $mentor_default_image,
                            'role_id' => $user_id['id']
                        ]
                    );
                    return back();
                } else {
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        $studentEdit = student::find($student)->first();
        $students = student::all();
        $groups = group::all();
        $courses = course::all();

        return view('student.index',compact('studentEdit','students','groups','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        $student = student::find($student)->first();
        if($student){
            $update = $student->update($request->input());
            if($update){
                return response()->json(['success' => true,'message' => 'Student updated successfully']);
            }
            else{
                return response()->json(['success' => false,'message' => 'Student not updated']);
            }
        }
        else{
            return response()->json(['success' => false,'message' => 'Student not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        $student = student::find($student);
        if($student){
            $delete = $student->delete();
            if($delete){
                return response()->json(['success' => true,'message' => 'Student delete successfully']);
            }
            else{
                return response()->json(['success' => false,'message' => 'Student not delete']);
            }
        }
        else{
            return response()->json(['success' => false,'message' => 'Student not found']);
        }
    }
}
