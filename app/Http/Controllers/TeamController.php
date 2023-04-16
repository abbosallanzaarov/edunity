<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamPostRequest;
use App\Models\course;
use App\Models\mentor;
use App\Models\Team;
use App\Models\GroupHelper;
use Illuminate\Http\Request;
use Carbon\Carbon;

trait TeamHelper{
    function storeHelper($data){
        $months = [];
        $dataMonth = $data['create_at'];
        for($i = 0;$i<$data['length'];$i++){
            $date = new Carbon($data['created_at']);
            $months[$i] = $date->addMonth();
        }

        $store = GroupHelper::create([
            'group_id'=>$data['id'],
            'length'=>$data['length'],
            'month'=>$months
        ]);
    }
}

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $team_count = count($teams);
        $mentor = mentor::select('id' ,'full_name')->get();
        $course = course::select('id' , 'full_name')->get();
        return view('group.index',compact('teams' , 'mentor' , 'course' , 'team_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tema.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Team::create($request->input());
        if($store){
            $group = Team::orderBy('id','desc')->first();

        }
        if($store){
            return redirect()->route('team.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Team $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        $mentor = mentor::all();
        $course = course::all();
        if($team){
            return view('group.edit',compact('team' , 'mentor' , 'course'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $tema = Team::find($id);
        if($tema){
            $store = $tema->update($request->input());
            if($store){
                return redirect()->route('team.index');
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
    public function destroy( $id)
    {
        $tema = Team::find($id);
        if($tema){
            $store = $tema->delete();
            if($store){
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
