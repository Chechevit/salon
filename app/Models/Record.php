<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'schedule_id',
        'user_id'
    ];

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}
