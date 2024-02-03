@extends('layouts.main')

@section('container')
<h1 class="text-center">{{ $title }}</h1>
<div class="row mt-4">
    @foreach ($authors as $author)
    <div class="col-md-3 mb-4">
        <a href="/posts?author={{ $author->username }}">
            <div class="card text-white p-0 m-0">
                <img src="https://source.unsplash.com/400x400?person={{ $author->name }}" class="card-img" alt="{{ $author->name }}">
                <div class="card-img-overlay d-flex align-items-end p-0 m-0">
                    <h5 class="card-title text-center flex-fill p-4 fs-5 m-0 " style="background-color: rgb(0, 0, 0, 0.7)">{{ $author->name }}</h5>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection