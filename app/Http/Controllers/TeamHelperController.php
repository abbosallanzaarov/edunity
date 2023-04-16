<?php

namespace App\Http\Controllers;
use App\Models\Team;

use Illuminate\Http\Request;

class TeamHelperController extends Controller
{
    public function active($id){
        $team = team::find($id);
        $date = date('Y-m-d');
        if($team->active == 1){
            $update = $team->update([
                'active'=>0,
                'active_date'=>$date
            ]);
        }else {
            $update = $team->update([
                'active'=>1,
                'active_date'=>$date
            ]);
        }

        if($update){
            return redirect()->route('team.index');
        }
    }
}
