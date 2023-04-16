<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Attendance as Atendanceies;
use App\Models\CoinManagment;
use App\Models\student;

class Attendance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $groupId;
    public function __construct($data , $groupId)
    {
        $this->data = $data;
        $this->groupId = $groupId;
    }


    public function handle()
    {
        $coniManagment = CoinManagment::first();
        unset($this->data['_token']);
        unset($this->data['student_count']);
        unset($this->data['group_id']);

        foreach($this->data as  $key => $data){
            if($key == 'yo\'q'){
                $students = student::where('id', $key)->get();
                foreach($students as $student){
                    if(!$student->balans == 0){
                        $student->update([
                            'balans' => $student->balans - $coniManagment->min_coin,
                        ]);
                    }
                    if($key == 'bor'){
                        $students = student::where('id', $key)->get();
                        foreach($students as $student){
                            $student->update([
                                'balans' => $student->balans + $coniManagment->max_coin,
                            ]);
                        }
                    }
                }
            }

                Atendanceies::create([
            'student_id' =>$key,
            'no'         =>$data,
            'group_id'   =>$this->groupId,
            'date'      => date('Y-m-d'),
        ]);
        }

    }
}
