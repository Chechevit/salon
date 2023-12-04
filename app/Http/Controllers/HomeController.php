<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('home', ['user' => $user]);
    }

    public function master(){
        return view('home', ['users' => User::all(), 'posts' => Post::all()]);
    }



    // public function schedule_graphic (Schedule $schedule){
    //     return view('home', ['schedule' => $schedule]);
    // }



    public function schedule_(Schedule $schedule){
        return view('home', ['schedules' => $schedule->all()]);
    }



    public function schedule()
    {
        return view('schedule-master');
    }

    public function addSchedule()
    {
        return view('add-schedule', ['categories' => Category::all()]);
    }
}
