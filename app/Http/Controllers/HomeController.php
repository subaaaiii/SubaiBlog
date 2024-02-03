<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home',[
            "title" => "Home",
            "image" => "assets/hero.png",
            "posts" => Post::latest()->get()
        ]);
    }
}
