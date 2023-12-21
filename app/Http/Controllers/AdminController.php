<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Category $category){
        $users = User::where('role_id', 2)->get();
        return view('admin', ['categories' => $category->all(),'users' => $users]);
    }

    public function add(Request $request){
        Category::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);
        return redirect()->back();
    }

    public function editCategory(Category $category, Request $request){
        $category->update(
            [
                'title'=>$request['title'],
                'description' => $request['description']
            ]
            );
            $category->save();
            return redirect()->back();
    }
    public function deleteCategory(Category $category){
        $category->delete();
        return redirect()->back();
    }

    public function addMaster(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>2
        ]);
        return redirect()->back();
    }

    public function deleteMaster(User $user){
        $user->delete();
        return redirect()->back();
    }
}
