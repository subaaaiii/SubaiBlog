@extends('dashboard.layouts.main')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Category</h1>
    </div>
    <div class="col-md-9">
        <form action="/dashboard/category" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autofocus>
              @error('name') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
              @error('slug') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Upload image</label>
              <img class="img-preview fluid mb-3 col-md-5" style="width: 100%; height: auto; max-width: 180px; max-height: 180px; object-fit: cover; object-position: top; overflow: hidden">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
          </form>
    </div>
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/dashboard/category/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endsection
