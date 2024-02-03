@extends('layouts.main')

@section('container')
    @include('partials.hero')
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col d-flex justify-content-end">
              <button class="btn btn-danger"><a href="/posts" style="text-decoration : none; color:white;">See All Posts <i class="bi bi-eye"></i></a></button>
            </div>
        </div>

        <div class="row">
                @foreach ($posts->take(3) as $post)
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
    
@endsection