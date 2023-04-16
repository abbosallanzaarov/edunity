<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\student;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class StudentGroups extends Controller
{
    public function index(){
        $id = Auth::user()->role_id;
        $student = student::find($id);
        $team = [];
        $groups = json_decode($student->group_id);
        foreach($groups as $group_id){
            $group = Team::find($group_id);
            array_push($team, $group);
        }
        // dd($team);
        return view('studentpages.groups.index', compact('team'));
    }
    public function group_students($id){
        $students = student::select('id' , 'full_name', 'group_id')->get();
        $team = [];
        foreach($students as $student){
            $array = json_decode($student->group_id);
            foreach($array as $arr){
                if($id == $arr){
                    // dd($arr);
                    array_push($team, $student);
                }else{
                    continue;
                }
            }
        }
        // dd($team);

    }
}
