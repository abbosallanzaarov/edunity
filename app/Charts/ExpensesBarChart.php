<?php

namespace App\Charts;

use App\Models\student;
use App\Models\Student\AnswerTasks;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class ExpensesBarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $month = 12;
        $plusCoin = [];
        $minusCoin = [];
        $array = AnswerTasks::where('student_id', Auth::user()->role_id)->where('checked', '!=', null)->get();
        for ($n = 0; $n < $month + 1; $n++) {
            $plusCoin[$n] = 0;
            $minusCoin[$n] = 0;
        }
        for ($n = 1; $n <= $month; $n++) {
            $plusCoin[$n] = 0;
            $minusCoin[$n] = 0;
            foreach ($array as $arr) {
                $month = $arr->created_at->format('m');
                if ($arr->checked == 1 and $month == $n) {
                    // array_push($plusCoin[$n],$arr->coin);
                    $plusCoin[$n] = $plusCoin[$n] + $arr->coin;
                }
                if ($arr->checked == 0 and $month == $n) {
                    // array_push($minusCoin[$n],$arr->coin);
                    $minusCoin[$n] = $minusCoin[$n] + $arr->coin;
                }
            }
        }
        $date = date('Y');
        return $this->chart->areaChart()
            ->setTitle('Plus Coin vs Minus Coin.')
            ->setSubtitle('Wins during season 2023')
            ->addData('Plus Coin', $plusCoin)
            ->addData('Minus Coin', $minusCoin)
            ->setXAxis(['', 'Yanvar', 'Febral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr']);
    }
}
