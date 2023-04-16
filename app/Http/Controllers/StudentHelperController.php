<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentHelperController extends Controller
{
    public function doubleStore(Request $request){
        $student = student::find($request->student_id);
            $group_array = [];
            foreach(json_decode($student->group_id) as $g_id){
                array_push($group_array, $g_id);
            }
            array_push($group_array, $request->group_id);
            $update = $student->update([
                'group_id' => $group_array
            ]);
            // dd($update);
            return redirect()->route('student.index')->with('student_message','Guruhga qo\'shildi');
    }
}
