<?php

namespace App\Http\Controllers;

use App\Models\mentor;
use App\Models\student;
use App\Models\Warning;
use Illuminate\Http\Request;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warnings = Warning::orderBy('id', 'desc')->get();
        // dd($warnings);
        return view('warning.index', compact('warnings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = student::all();
        $mentors = mentor::all();
        return view('warning.create', compact('students', 'mentors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Warning::create($request->input());
        if($store){
            return redirect()->route('warning.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function show(Warning $warning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function edit(Warning $warning)
    {
        $students = student::all();
        $mentors = mentor::all();
        $warning = Warning::find($warning->id);
        // dd($warning);
        return view('warning.edit', compact('warning','students','mentors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warning $warning)
    {
        $warning = Warning::find($warning->id);
        $update = $warning->update($request->input());
        if($update){
            return redirect()->route('warning.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warning $warning)
    {
        $warning = Warning::find($warning->id);
        $delete = $warning->delete();
        if($delete){
            return redirect()->route('warning.index');
        }else{
            return redirect()->back();
        }
    }
}
