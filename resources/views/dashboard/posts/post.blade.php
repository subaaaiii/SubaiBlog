@extends('dashboard.layouts.main')

@section('main')
<div class="row">
    <div class="col-md-8 mt-3 mb-5">
            <h2>{{ $post->title }}</h2>
            <a href="/dashboard/posts" class="text-decoration-none text-white"><button  class="btn btn-sm btn-success"><i class="bi bi-arrow-left"></i> back to posts</button></a>
            <a href="#" class="text-decoration-none text-white"><button  class="btn btn-sm btn-secondary"><i class="bi bi-pencil-square"></i> Edit</button></a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash" onclick="return confirm('Are you sure?')"></i> Delete</button>
            </form>
            @if($post->image)
            <div style="max-height:400px; overflow:hidden;">
                <img src="{{ asset('storage/' .$post->image) }}" class="card-img-top my-3" alt="{{ $post->category->name }}">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top my-3" alt="{{ $post->category->name }}">
            @endif
            
            {!! $post->body !!} <br>
    </div>
</div> 
@endsection
