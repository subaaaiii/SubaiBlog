@extends('layouts.main')

@section('container')
<h1 class="text-center">{{ $title }}</h1>
<div class="row mt-4">
    @foreach ($categories as $category)
    <div class="col-md-3 mb-4">
        <a href="/posts?category={{ $category->slug }}">
            <div class="card text-white">
                <div class="card-img-overlay d-flex align-items-center p-0">
                    <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgb(0, 0, 0, 0.5)">{{ $category->name }}</h5>
                </div>
                @if($category->image)
                <img src="{{ asset('storage/' .$category->image) }}" class="card-img" alt="{{ $category->name }}" style="max-height: 300px; object-fit: cover; object-position: top; overflow: hidden">
                @else
                <img src="https://source.unsplash.com/400x400?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                @endif
            </div>
        </a>
    </div>
    @endforeach
</div> 
@endsection