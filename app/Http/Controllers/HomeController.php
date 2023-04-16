<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\mentor;
use App\Models\Warning;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\User;


class HomeController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index(Request $request)
    {
    $user = Auth::user()->role;
    $user_role_id = Auth::user()->role_id;

        if($user == 'admin'){
            $count = new NotificateCantroller();
            $count = $count->gateTeamCount();
            $request->session()->put('array_count',$count);
            return view('dashboard' );
        }elseif($user == 'mentor'){
            $warnings = Warning::where('mentor_id', $user_role_id)->get();
            $mentor = mentor::where('id' , $user_role_id)->first();
            $group = Team::where('mentor_id' ,$mentor->id )->get();
            $team_count = count($group);
            return view('mentorpages.dashboard' , compact('group' , 'team_count','warnings'));
        }elseif($user == 'student'){
            $warnings = Warning::where('student_id', $user_role_id)->get();
            $student = student::where('id', $user_role_id)->first();
            $request->session()->put('coin', $student->balans);
            // dd($request->session());
            return view('studentpages.dashbord' , compact('student','warnings'));
        }
    }
}
