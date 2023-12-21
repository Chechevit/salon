<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function createRecord(Schedule $schedule){
        $user_id = Auth::user()->id;
        Record::create([
            'schedule_id' => $schedule->id,
            'user_id' => $user_id
        ]);

        $schedule->status_id = 2;
        $schedule->save();
        return redirect()->back();
    }

    public function deleteRecord(Record $record){
        $record->delete();
        return redirect()->back();
    }
}
