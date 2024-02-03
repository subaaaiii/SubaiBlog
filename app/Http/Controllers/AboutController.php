<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('about',[
            "title" => "About",
            "nama" => "Subairi",
            "email" => "Subairibairi689@gmail.com",
            "foto" => "assets/Subai.jpg"
        ]);
    }
}
