@extends('layouts.main')

@section('container')
        <div class="row justify-content-center">
                <div class="col-md-8 mb-5">
                        <h2>{{ $post->title }}</h2>
                        <p>By
                        <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
                        in 
                        <a href="/categories/{{ $post->category->slug }} " class="text-decoration-none">{{ $post->category->name }}</a></p>
                        @if($post->image)
                        <div style="max-height:350px; overflow:hidden;">
                                <img src="{{ asset('storage/' .$post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
                        </div>
                        @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        @endif  
                        {!! $post->body !!} <br>
                        <a href="/posts" class="text-decoration-none text-white"><button  class="btn btn-secondary">back to posts</button></a>
                </div>
        </div> 
@endsection

