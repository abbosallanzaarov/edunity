<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\PaymentHistory;
use App\Models\student;
use App\Models\Team;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    public function Paymentresidual()
    {
        $teams = Team::select('id', 'name')->get();
        return view('residual.index', compact('teams'));

    }
    public function residualStudents($id)
    {
        $group = Team::find($id);
        $salary = course::where('id', $group->course_id)->first();
        $salary = $salary['salary'];
        $length = $group->length;
        $students = student::where('group_id', $id)->get();
        $payments = [];
        foreach ($students as $student) {
            for ($i = 1; $i <= $length; $i++) {
                if (empty($payments[$student->full_name][$i])) {
                    $payments[$student->full_name][$i] = PaymentHistory::where('student_id', $student->id)->where('month', $i)->get();
                } else {
                    $payments[$student->full_name][$i] = $payments[$student->full_name][$i] + PaymentHistory::where('student_id', $student->id)->where('month', $i)->get();
                }
            }
        }
        // dd($payments);
        return view('residual.show', compact('payments', 'length', 'salary'));
    }
}
