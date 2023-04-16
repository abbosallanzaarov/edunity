<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\AnswerTasks;
use App\Models\Tasks;
use App\Models\Tema;
use Illuminate\Http\Request;
use Auth;

class AnswerTask extends Controller
{
    public function index($id){
        $task = Tasks::where('id',$id)->first();
        // dd($task);
        return view('studentpages.answertasks.index', compact('task'));
    }
    public function store(Request $request){
        // validte
        $store = AnswerTasks::create([
            'task_id'=>$request->task_id,
            'answer'=>$request->answer,
            'checked'=>$request->checked,
            'student_id'=>Auth::user()->role_id
        ]);
        $tasks = Tasks::where('id',$request->task_id)->first();
        $id = $tasks->tema_id;
        if($store){
            return redirect()->route('student.mytasks.show',$id);
        }else{
            return redirect()->back()->with('error','Answer not store');
        }
    }
}
