<?php

namespace App\Http\Controllers;

use App\Models\AnswerTasks;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Charts\ExpensesBarChart;

class StudentResultController extends Controller
{
    public function index(ExpensesBarChart $chart){
        $result = AnswerTasks::orderBy('id','desc')->where('student_id',Auth::user()->role_id)->get();
        // dd(Auth::user()->role_id);
        $plusCoin = 0;
        $minusCoin = 0;



        foreach($result as $natija){
            if($natija->checked == 1){

                $plusCoin = $plusCoin + $natija->coin;
            }elseif($natija->checked == 0){
                $minusCoin = $minusCoin + $natija->coin;
            }
        }
        


        $chart = $chart->build();

        return view('studentpages.result.index', compact('result','plusCoin','minusCoin' ,'chart'));
    }
    public function show($id){
        $result = AnswerTasks::find($id);
        // dd(Auth::user()->role_id);
        return view('studentpages.result.show', compact('result'));
    }
}
