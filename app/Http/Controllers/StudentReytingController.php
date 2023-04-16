<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\Team;
use Auth;

use Illuminate\Http\Request;

class StudentReytingController extends Controller
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
        return view('studentpages.reyting.index', compact('groups'));

    }
    public function show($id){
        $students = student::orderBy('balans','asc')->get();
        // dd($students);
        $team = [];
        foreach($students as $student){
            $array = json_decode($student->group_id);
            foreach($array as $arr){
                if($id == $arr){
                    // dd($arr);
                    array_push($team, $student);
                }else{
                    continue;
                }
            }
        }
        // dd($team);
        return view('studentpages.reyting.show', compact('team'));
    }
}
