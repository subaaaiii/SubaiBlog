@extends('dashboard.layouts.main')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Category</h1>
    </div>
    <a href="/dashboard/category/create" class="text-decoration-none text-white"><button  class="btn btn-sm btn-success">Make new category</button></a>
    <div class="col-md-9 mt-3">
      @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @endif
    </div>
  <div class="table-responsive small col-md-9 ">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Image</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
              @if($category->image)
              <img src="{{ asset('storage/'.$category->image) }}" class="img-preview fluid mb-3 col-md-5 d-block" style="width: 50px; height: 50px; object-fit: cover; object-position: top; overflow: hidden">
              @endif
            </td>
            <td>
                <a href="/dashboard/category/{{ $category->slug }}/edit" class="text-decoration-none text-white"><button  class="btn btn-sm btn-secondary"><i class="bi bi-pencil-square"></i></button></a>
                <form action="/dashboard/category/{{ $category->slug }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash" onclick="return confirm('Are you sure?')"></i>
                </button>
                </form>
            </td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
