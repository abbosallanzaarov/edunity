<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\Team;

class NotificateCantroller extends Controller
{

    public function next_month()
    {
        $group_active = Team::where('active', 1)->get();
        $now = date('Y-m-d');
        $next_month = date('Y-m-d', strtotime('-1 month', strtotime($now)));
        $group_array = [];
        $n = 1;
        foreach ($group_active as $group) {
            $n = $group->length;
            for ($i = 0; $i < $n; $i++) {
                if ($group->active_date == date('Y-m-d', strtotime(-$i . 'month', strtotime($now)))) {
                    $group_array[$n] = $group;
                    break;
                }
            }
            $n++;
        }
        $count = count($group_array);

        return view('group.notificate', compact('group_array'));

    }
    public function group_students($id)
    {
        $students = student::where('group_id', $id)->get();

        // return view('group.payStudents', compact('students'));

    }
    public function gateTeamCount(){
        $group_active = Team::where('active', 1)->get();
        $now = date('Y-m-d');
        $next_month = date('Y-m-d', strtotime('-1 month', strtotime($now)));
        $group_array = [];
        $n = 1;
        foreach ($group_active as $group) {
            $n = $group->length;
            for ($i = 0; $i < $n; $i++) {
                if ($group->active_date == date('Y-m-d', strtotime(-$i . 'month', strtotime($now)))) {
                    $group_array[$n] = $group;
                    break;
                }
            }
            $n++;
        }
        return $count = count($group_array);
    }

}
