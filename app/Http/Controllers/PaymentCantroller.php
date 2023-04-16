<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\PaymentHistory;
use App\Models\student;
use App\Models\Team;
use Illuminate\Http\Request;

class PaymentCantroller extends Controller
{
    private  $monthSumma;
    private  $paySumResult;
    public function index()
    {
        $groups = Team::all();
        return view('payment.index', compact('groups'));
    }
    public function student($id)
    {
        $studentAll = student::all();
        $group_id = Team::find($id);
        $students = [];
        // dd($group_id);
        foreach($studentAll as $talaba){
            foreach(json_decode($talaba->group_id,true) as $Studentgroup_id){
                if($Studentgroup_id == $id){
                    array_push($students, $talaba);
                } 
            }
        }
        
        return view('payment.students', compact('students' , 'group_id'));
    }
    public function studentPayment( Request $request , $id)
    {
        $course_id = course::find($request->course_id);
        $this->paymentValidateMonth($id, $request->month);
        $this->paySumValidate($course_id, $request->pay_summa);
        if($this->monthSumma >= $course_id->salary ){
            return redirect()->back()->with('monthMessage', 'Bu summa Kattaroq Qoldiq summalar bo\'limidan Qo\'ldiq Summani tekshiring');
        }
        if($this->paySumResult == true){
            $message = ' Kurs summasi ' . ' ' . $course_id->salary . ' sum ga teng Siz To\'lanyotga summa esa  ' .'' . $request->pay_summa  .'  '. 'Bu Katta Summa';
            return redirect()->back()->with('message_error', $message);
        }else{
            $store = PaymentHistory::create([
                'group_id'=>$request->group_id,
                'student_id'=>$id,
                'month'=>$request->month,
                'summa'=>$request->pay_summa
            ]);
            return redirect()->back()->with('message', ' To\'lov  To\'landi va Saqlandi');
        }

    }
    // public function fillingEnd($id, Request $request)
    // {
    //     $student = student::where('id', $id)->first();
    //     $balans = $student->balans;
    //     $student->update([
    //         'balans' => $balans + $request->price
    //     ]);
    //     return back()->with('successpayment', 'To\'lov Qabul Qilindi');
    // }
    public function studentPaymentHistory($id){
        $payHistory = PaymentHistory::where('student_id', $id)->get();
        $student = student::find($id);
        $group_id = $student->group_id;
        $groups = [];
        // dd($group_id);
        foreach(json_decode($group_id,true) as $id){
            array_push($groups, Team::find($id));
        }
        // $array = [];
        // foreach($payHistory as $history){

        // }
        return view('payment.show', compact('payHistory','groups'));
    }
    private function paymentValidateMonth($id , $month){
        $students = PaymentHistory::where('student_id', $id)->where('month' , $month)->get();
        $result_summa = 0;
        foreach($students as $student){
            $result_summa += $student->summa;
        }
        $this->monthSumma = $result_summa;
    }
    private function paySumValidate($courseId , $paySum){
        if( $paySum > $courseId->salary ){
            $this->paySumResult = true ;
        }else{
            $this->paySumResult = false;
        }
    }


}
