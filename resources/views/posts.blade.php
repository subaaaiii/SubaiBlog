@extends('layouts.main')

@section('container')
<h1 class="text-center">{{ $title }}</h1>
<div class="row justify-content-center my-3">
    <div class="col-md-6">
        <form action="/posts">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @elseif (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit" >Search</button>
              </div>
        </form>
    </div>
</div>
@if ($posts->count())
<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">
                <a href="/posts?category={{ $posts[0]->category->slug }}">
                    <div class="position-absolute text-white px-4 py-2" style="background-color: rgb(0, 0, 0, 0.5)">{{ $posts[0]->category->name }}</div>
                    @if($posts[0]->image)
                    <div style="max-height:350px; overflow:hidden;">
                        <img src="{{ asset('storage/' .$posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                    </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                    @endif                
                </a>

                <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-black">{{ $posts[0]->title }}</a></h5>
                <p class="card-text"><small class="text-body-secondary">By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
                <p class="card-text"><p>{{ $posts[0]->excerpt }}</p></p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-danger">Read More</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="/posts?category={{ $post->category->slug }}">
                                <div class="position-absolute text-white px-4 py-2" style="background-color: rgb(0, 0, 0, 0.5)">{{ $post->category->name }}</div>
                            @if($post->image)
                            <div style="max-height:225px; overflow:hidden;">
                                <img src="{{ asset('storage/' .$post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
                            </div>
                            @else
                                <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            </a> 
                            <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-black">{{ $post->title }}</a></h5>
                            <p class="card-text"><small class="text-body-secondary">By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}</small></p>
                            <p class="card-text"><p>{{ $post->excerpt }}</p></p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-danger">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
</div> 

@else
    <p class="text-center fs-4">No Post Found</p>
@endif
{{ $posts->links() }}
@endsection