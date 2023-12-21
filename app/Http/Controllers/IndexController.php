<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Record;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Schedule $schedule){
        $schedule = $schedule->where('status_id', 1)->get();
        return view('index', ['categories' => Category::all(), 'posts' => Post::all(), 'schedules' => $schedule->all()]);
    }



    public function home_cat(Schedule $schedule){
        $schedule = $schedule->where('status_id', 1)->get();
        return view('home', ['categories' => Category::all(), 'posts' => Post::all(), 'schedules' => $schedule->all()]);
    }



    public function show_master (User $user){
        $user = $user->where('role_id', 2);
        return view('index', ['categories' => Category::all(), 'user' => $user->paginate(4)]);
    }

    public function categ (User $user){
        $user = $user->where('role_id', 2)->get();
        return view('home', ['categories' => Category::all(), 'user' => $user]);
    }

    public function show_master_as (User $user){
        $user = $user->where('role_id', 2)->get();
        return view('home', ['user' => $user]);
    }

    public function records()
    {
        $records = Auth::user()->record;
        return view('home', ['records' => $records]);
    }

    public function masterPage(User $user){
        $schedule = Schedule::where('user_id', $user->id)->where('status_id', 1)->get();

        return view('master-page', ['user'=>$user, 'schedules' => $schedule->all()]);
    }
}
