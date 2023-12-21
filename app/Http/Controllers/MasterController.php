<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Record;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    public function show_master_cab(User $user, Schedule $schedule, Request $request){
        $filter = $request->category;

        if($filter){
            $schedules = $schedule->where('status_id', 1)->where('category_id', $filter)->get();
        }else{
            $schedules = $schedule->where('status_id', 1)->get();
        }
    
        $requestSort = $request->sort;
        $schedule = Schedule::where('user_id', Auth::user()->id)->get();
    
        $records = Record::all();
        $data = [];
        foreach ($schedule as $scheduleItem) {
            foreach ($records as $record) {
                if ($scheduleItem->id == $record->schedule_id) {
                    $data[] = [
                        'schedule' => $scheduleItem,
                        'record_id' => $record->id
                    ];
                }
            }
        }
    
        return view('cabinet', ['schedules'=>$schedules,'user'=>$user, 'records' => $data, 'categories' => Category::all(), 'requestSort'=>$requestSort]);
        // dd($requestSort);
    }
    

    public function viewSchedule()
    {
        return view('schedule-master');
    }

    public function viewAddSchedule()
    {
        return view('add-schedule', ['categories' => Category::all()]);
    }

    public function addSchedule(Request $request){
        Schedule::create([
            'date'=>$request->date,
            'time'=>$request->time,
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->back();
    }

    public function deleteSchedule(Schedule $schedule){
        $schedule->delete();
        return redirect()->back();
    }
}
