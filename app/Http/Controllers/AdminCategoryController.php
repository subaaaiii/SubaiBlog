<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.category.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>  'required|max:255',
            'slug' => 'required|unique:categories',
            'image' => 'image|file|max:2048',
        ]);
        if($request->image){
            $data['image']=$request->file('image')->store('category-images');
        }
        Category::create($data);
        return redirect('/dashboard/category')->with('success', 'New Category Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Dashboard.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = ([
            'name' =>  'required|max:255',
        ]);
        if($request->slug != $category->slug)
        {
            $rules['slug'] = 'required|unique:categories';
        }
        $data = $request->validate($rules);
        if($request->image){
            if($category->image)
            {
                Storage::delete($category->image);
            }
            $data['image']=$request->file('image')->store('category-images');
        }
        Category::where('id', $category->id)
            ->update($data);

        return redirect('/dashboard/category')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image)
            {
                Storage::delete($category->image);
            }
        Category::destroy($category->id);

        return redirect('/dashboard/category')->with('success', 'Category has been deleted');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
