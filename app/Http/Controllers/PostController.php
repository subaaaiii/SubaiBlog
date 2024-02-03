<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title='';
        if(request('category')){
            $category = category::firstWhere('slug', request('category')) ;
            $title = ' in '.$category->name;
        }
        if(request('author')){
            $author = user::firstWhere('username', request('author')) ;
            $title = ' by '.$author->name;
        }
        return view('posts', [
            "title" => "All Posts" .$title,
            "nama" => "subairi",
            "email" => "subairi@gmail.com",
            "foto" => "subai",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() //with: eager loading
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Post",
            "post" => $post->load('category', 'author'),
        ]);
    }
    public function allCategories()
    {
        return view('categories', [
            "title" => 'Categories',
            "categories" => Category::all(),
        ]);
    }

    public function allAuthors()
    {
        return view('authors', [
            "title" => 'Authors',
            "authors" => User::all(),
        ]);
    }

}
