<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\student;
use App\Models\Tasks;
use App\Models\Team;
use App\Models\Tema;

use App\Models\AnswerTasks;
use Auth;

use Illuminate\Http\Request;

class myTasksController extends Controller
{
    public function index(){
        $role_id = Auth::user()->role_id;
        $student = student::find($role_id);
        $group_id = $student->group_id;
        $groups = [];
        // dd($group_id);
        foreach(json_decode($group_id,true) as $id){
            array_push($groups, Team::find($id));
        }
        // dd($groups);
        return view('studentpages.tasks.group', compact('groups'));
    }
    public function temaShow($id){
        $tema = Tema::where('group_id', $id)->get();
        // dd($tema);
        return view('studentpages.tasks.tema', compact('tema'));
    }
    public function taskShow($id){
        // dd($id);
        $tasks = Tasks::where('tema_id', $id)->get();
        $role_id = Auth::user()->role_id;
        $student = student::find($role_id);
        // dd($student->id);
        // foreach($tasks as $task)
        // $answer = AnswerTasks::where('task_id', $task->id)->first();

        return view('studentpages.tasks.tasks', compact('tasks','student'));
    }
}
