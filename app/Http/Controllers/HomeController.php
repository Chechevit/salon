<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Record;
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
        $role = Auth::user()->role_id;
        
        
        switch($role){
            case 1: 
                return redirect('admin/');
            case 2:
                return redirect('master/cabinet');
            case 3: 
                $records = Record::where('user_id', Auth::user()->id)->get();
                $records->map(function ($record) {
                    return [
                        'schedule' => $record->schedule,
                        'record' => $record,
                    ];
                });
                return view('home', ['records' => $records, 'user'=>Auth::user()]);
        }
    }

    public function updateUser(User $user, Request $request){
        if(empty($request->password)){
            $password = $user->password;
        }else{
            $password = $request->password;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);
        return redirect()->back();
    }
}
