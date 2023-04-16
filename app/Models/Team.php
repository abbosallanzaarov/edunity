<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function courses(){
        return $this->belongsTo(course::class);
    }


    public function mentor()
    {
        return $this->belongsTo(mentor::class);
    }
}
