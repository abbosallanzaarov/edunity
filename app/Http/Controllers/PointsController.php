<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Models\student;
use App\Models\Team;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointsController extends Controller
{

    function index()
    {
        $mentorGroup = Team::where('mentor_id', Auth::user()->role_id)->get();
        return view('mentorpages.points.index', compact('mentorGroup'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

        
        $students = student::where('group_id', $id)->get();

        return view('mentorpages.points.show', compact('students'));

    }

    public function edit(Points $points)
    {
        //
    }

    public function update(Request $request, Points $points)
    {
        //
    }

    public function destroy(Points $points)
    {
        //
    }
}
