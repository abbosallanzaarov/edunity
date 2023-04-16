<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Jobs\Attendance as AttendanceJob;
use App\Models\student;
use Illuminate\Support\Facades\Auth;
use App\Models\mentor;
use App\Models\Team;


class MentorGroupController extends Controller
{

    public function mentorGroupSHow()
    {
        $mentor_id = Auth::user()->role_id;
        $mentor = mentor::where('id', $mentor_id)->first();
        $group = Team::where('mentor_id', $mentor->id)->get();
        return view('mentorpages.attendanceshow', compact('group'));
    }

    public function index($id)
    {
        $group_id = $id;
        $students = student::select('id' , 'full_name', 'group_id')->get();
        $student_groupId = [];
        foreach($students as $student){
            $array = json_decode($student->group_id);
            foreach($array as $arr){
                if($id == $arr){
                    // dd($arr);
                    array_push($student_groupId, $student);
                }else{
                    continue;
                }
            }
        }
        // dd($team);
        $student_count = count($student_groupId);
        return view('mentorpages.mentorgroup.index', compact('student_groupId', 'group_id', 'student_count'));
    }
    public function attendance(Request $request)
    {
        dispatch(new AttendanceJob($request->all(), $request->group_id));
        return redirect()->back();
    }
    public function passLessonStudent($id){
        $data = [];
        $attendance = Attendance::where('group_id', $id)->get()->groupBy('student_id');
        dd($attendance);

        return view('mentorpages.mentorgroup.attendanceshow', compact('attendance','data'));

    }
}




