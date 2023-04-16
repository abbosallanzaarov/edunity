<?php

namespace App\Http\Controllers;
use App\Models\student;
use App\Models\Tasks;
use App\Models\Team;
use App\Models\Tema;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorMenuController extends Controller
{
    public function openGroup(){

    }
    public function mentor_group(){
        $id = Auth::user()->role_id;
        $groups = Team::where('mentor_id',$id)->get();
        return view('mentorpages.mentorgroupshow.index' , compact('groups'));
    }
    public function groups_show_student($id){
        $students = student::get();
        $students_mentor = [];
        foreach($students as $student){
            $array = json_decode($student->group_id);
            foreach($array as $arr){
                if($id == $arr){
                    // dd($arr);
                    array_push($students_mentor, $student);
                }else{
                    continue;
                }
            }
        }
        return view('mentorpages.mentorgroupshow.student' , compact('students_mentor'));
    }
    public function mentor_group_tema($id){
        $group = Team::find($id);
        $temas = Tema::where('group_id',$id)->get();
        return view('mentorpages.mentorgroupshow.tema',compact('temas' ,'group'));
    }
    public function tematasks($id){
        $tema_id = Tema::find($id);
        $tasks = Tasks::where('tema_id',$id)->get();
        return view('mentorpages.mentorgroupshow.tasks',compact('tasks' ,'tema_id'));
    }
}
