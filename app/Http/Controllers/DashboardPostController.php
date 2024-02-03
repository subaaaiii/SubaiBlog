<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // ddd(auth()->user()->id);
        $data = $request->validate([
            'title' =>  'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'image' => 'image|file|max:2048',
            'category_id' => 'required'
        ]);
        if($request->image){
            $data['image']=$request->file('image')->store('post-images');
        }
        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 40);

        Post::create($data);

        return redirect('/dashboard/posts')->with('success', 'New Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('Dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = ([
            'title' =>  'required|max:255',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        if($request->slug != $post->slug)
        {
            $rules['slug'] = 'required|unique:posts';
        }

        $data = $request->validate($rules);
        if($request->image){
            if($post->image)
            {
                Storage::delete($post->image);
            }
            $data['image']=$request->file('image')->store('post-images');
        }
        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::where('id', $post->id)
            ->update($data);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image)
            {
                Storage::delete($post->image);
            }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
