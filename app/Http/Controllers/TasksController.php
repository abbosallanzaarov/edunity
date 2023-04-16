<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Models\Tema;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tema = Tema::all();
        $tasks = Tasks::paginate();
        return view('mentorpages.mentortask.index' , compact('tema' , 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tema = Tema::all();
        return view('mentorpages.mentortask.create' , compact('tema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file());
        $uploaded = $request->file('file');
        if($uploaded){
            $tmp_name = $request->file('file')->getClientOriginalExtension();
            $new_name = rand(100,999).time().'_audio.'.$tmp_name;
            $move = $uploaded->move(public_path('audio\uploaded-audio'),$new_name);
            $baza_name ="audio/uploaded-audio/".$new_name;
        }
            $create_task = Tasks::create([
                'tema_id' =>$request->tema_id,
                'tasks'   =>$request->task,
                'file'   =>$baza_name,
                'file_type'=>$request->file_type
            ]);
            if($move and $create_task){
                return redirect()->back()->with('task' , 'Vazifa Qo\'shildi');
            }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {

            return view('mentorpages.tasks.update',compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks)
    {
        $task = Tasks::find($tasks['id']);
        if($task){
            $store = $task->update($request->input());
            if($store){
                return redirect()->ruote('task.index');
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        $task = Tasks::find($tasks['id']);
        if($task){
            $store = $task->delete($tasks['id']);
            if($store){
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
