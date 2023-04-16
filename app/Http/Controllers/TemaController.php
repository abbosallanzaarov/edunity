<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemaPostCreateRequest;
use App\Models\Team;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tema = Tema::paginate();
        $tema_count = count($tema);
        $mentorId = Auth::user()->role_id;
        if (!$mentorId) {
            return view('auth.login')->with('mentor_error', 'siz dasturdan ko\'p vaq davomi chiqmadingiz sizni  tekshirish lozim email va parolni kiriting');
        }
        $team = Team::where('mentor_id', $mentorId)->get();
        return view('mentorpages.mentorsubject.index', compact('tema', 'team' ,'tema_count'));
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
    public function store(TemaPostCreateRequest $request)
    {
        $tema = Tema::create($request->input());
        if ($tema) {
            return back()->with('tema', 'Tema Yaratildi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $tema = Tema::find($id);
        $team = Team::select('id' ,'name')->get();
        return view('mentorpages.mentorsubject.edit' , compact('tema' , 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $tema = Tema::find($id);
        $tema->update($request->input());
        return redirect()->
        route('tema.index')->
        with('success_update' , 'Mavzu O\'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema_delete = Tema::find($id);
        $delete_tema = $tema_delete->delete();
        if ($delete_tema) {
            return back()->with('delete_team', 'Mavzu o\'chirildi');
        }
    }
}
