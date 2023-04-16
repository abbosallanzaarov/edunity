<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Student\AnswerTask;
use App\Models\CoinManagment;
use App\Models\student;
use App\Models\Tasks;
use App\Models\Tema;
use Auth;
use App\Models\mentor;
use App\Models\Team;
use App\Models\AnswerTasks;
use Illuminate\Http\Request;

class MentorCheckedTaskController extends Controller
{
    public function index(){
        $mentor_id = Auth::user()->role_id;
        $mentor = mentor::where('id', $mentor_id)->first();
        $groups = Team::where('mentor_id', $mentor->id)->get();
        return view('mentorpages.checkedTasks.index', compact('groups'));
    }
    public function answerTask($id){
        $tema = Tema::where('group_id', $id)->get();
        return view('mentorpages.checkedTasks.studentanswer', compact('tema'));
    }
    public function temaTasks($id){
        $tasks = Tasks::where('tema_id', $id)->get();
        return view('mentorpages.checkedTasks.tematasks', compact('tasks'));
    }
    public function taskAnswerSee($id){
        $answerTask = AnswerTasks::orderBy('id','desc')->where('task_id', $id)->get();
        return view('mentorpages.checkedTasks.answertasksee', compact('answerTask'));

    }
    public function answerCheck($id , Request  $request){
        $answer = AnswerTasks::find($id);
        if($answer->coin != 0){
            return redirect()->back()->with('error_coin', 'bu student javob tekshirilgan');
        }

        $student = student::find($answer->student_id);
        $coin_management = CoinManagment::find(1);
        if($request->input('yes')){
            $answer->update([
                'checked'=>1,
                'coin' => $coin_management->true_answer
            ]);
            $student->update([
                'balans' => $student->balans + $coin_management->true_answer

            ]);
        }elseif($request->input('no')){
            $answer->update([
                'checked'=>0,
                'coin' => $coin_management->false_answer
            ]);
            $student->update([
                'balans' => $student->balans - $coin_management->false_answer
            ]);
        }


        return redirect()->back();
    }
}
