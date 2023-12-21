<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'time',
        'user_id',
        'category_id'
    ];
    public function record(){
        return $this->hasMany(Record::class);
    }
}
