<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class UserCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_data;
    protected $role;
    protected $role_id;

    public function __construct($user_data , $role , $role_id)
    {
        $this->user_data = $user_data;
        $this->role = $role;
        $this->role_id = $role_id;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::create([
            'name'=>$this->user_data['full_name'],
            'phone'=>$this->user_data['phone'],
            'email'=>$this->user_data['email'],
            'password'=>Hash::make($this->user_data['password'],),
            'user_image' => $this->user_data['image'],
            'role'=>$this->role,
            'role_id'=>$this->role_id,
            'balans'=>0,
            'debt'=>0
        ]);
    }
}
