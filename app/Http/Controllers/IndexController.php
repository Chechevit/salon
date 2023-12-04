<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('index', ['categories' => Category::all(), 'posts' => Post::all()]);
    }
}
