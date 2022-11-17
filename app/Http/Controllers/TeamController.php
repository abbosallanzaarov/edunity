<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamPostRequest;
use App\Models\course;
use App\Models\mentor;
use App\Models\Team;
use Illuminate\Http\Request;

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
        $mentor = mentor::select('id' , 'full_name')->get();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamPostRequest $request)
    {
        $team_create = Team::create($request->input());
        return back()->with('success_team' , 'gurux yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        $mentor = mentor::select('id' , 'full_name')->get();
        $course = course::select('id' , 'full_name')->get();
        return view('group.edit' , compact('team' , 'mentor' , 'course') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $tema = Team::find($id);
        $tema->update($request->input());
        return redirect()->
        route('team.index')->
        with('team_update', 'Muvaffaqyatli \'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $team = Team::find($id);
        $team->delete();
        return back()->
        with('delete_team' ,  $team->name . '  '. 'O\'chirildi');
    }
}
