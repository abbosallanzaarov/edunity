<?php

namespace App\Http\Controllers;

// use App\Events\StudentCreate;
use App\Http\Requests\StudentCreateRequest;
use App\Models\course;
use App\Models\student;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;

use App\Jobs\UserCreateJob;


class StudentController extends Controller
{

    public function index()
    {
        // dd('muhammad');
        $team = Team::select('id', 'name')->get();
        $course = course::select('id', 'full_name')->get();
        $students = student::all();
        $student_count = count($students);
        return view('student.index', compact('students', 'team', 'course', 'student_count'));
    }

    public function store(StudentCreateRequest $request)
    {
        // dd($request->input());

            $uploaded = $request->file('image');
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            $new_name = rand(100, 999) . time() . '_image.' . $tmp_name;
            $move = $uploaded->move(public_path('images/'), $new_name);
            $dataBase_name = "images/" . $new_name;
            if ($move) {
                $group_id = [];
                array_push($group_id, $request->group_id);
                $store = Student::create([
                    'full_name' =>$request->full_name,
                    'phone'=>$request->phone,
                    'birthday'=>$request->birthday,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'group_id'=>json_encode($group_id),
                    'image'=>$dataBase_name
                ]);
                if ($store) {
                    $student = student::orderBy('id', 'desc')->select('id')->first();
                    $role = "student";
                    UserCreateJob::dispatch($store, $role, $student->id);
                    return redirect()->route('student.index')->with('student_create', 'Student yaratildi');
                }
            } else {
                return redirect()->route('student.index')->with('student_error', 'Student yaratilmadi');
            }


    }

    public function show(student $student)
    {
        return view('student.show', compact('student'));
    }


    public function edit(student $student)
    {
        $team = Team::select('id', 'name')->get();
        $course = course::select('id', 'full_name')->get();
        return view('student.edit', compact('student', 'team', 'course'));
    }

    public function update(Request $request, $id)
    {
        $student = student::find($id);
        $uploaded = $request->file('image');
        if ($uploaded) {
            $tmp_name = $uploaded->getClientOriginalExtension();
            $new_name = rand(100, 999) . time() . '_image.' . $tmp_name;
            $move = $uploaded->move(public_path('images/'), $new_name);
            $dataBase_name = "images/" . $new_name;
            // $student_update = $student->update($request->input());
            $student_update = $student->update([
                'full_name' =>$request->full_name,
                'phone'=>$request->phone,
                'birthday'=>$request->birthday,
                'email'=>$request->email,
                'password'=>$request->password,
                'image'=>$dataBase_name
            ]);
            if ($student_update) {
                $user = User::where('role', 'student')->where('role_id', $student->id)->first();
                $user->update([
                    'email' => $request->email,
                    'password' => $request->password,
                    'user_image' => $dataBase_name ?? $student->image
                ]);
            }
            return redirect()->route('student.index');
        }
        return redirect()->back()->with('student_error','Student not updated');
    }

    public function destroy(student $student, ImageService $imageService)
    {
        // dd($student->id);
        $student_image_name = $student->image;
        $user = User::where('role', 'student')->where('role_id', $student->id)->first();
        // dd($user);
        $user->delete();
        $student = student::find($student->id)->delete();

        $imageService->image_file_delete($student_image_name);
        return redirect()->route('student.index')->with('delete_student', 'Student O\'chirildi');
    }
}
