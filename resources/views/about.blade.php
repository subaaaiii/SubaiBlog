@extends('layouts.main')

@section('container')
<h2>About</h2>
 <div class="row mb-5">
    <div class="col-md-6">
        <h4>A web by {{ $nama }}</h4>
        <p>{{ $email }}</p>
        <img src="{{ $foto }}" alt="foto" width="200px" class="img-thumbnail">
    </div>
    <div class="col-md-6">
        <h4>Send me a message</h4>
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"
          >Name</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          placeholder="Input your name"/>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"
          >Message</label>
        <textarea class="form-control" placeholder="Leave a Message here" id="floatingTextarea"></textarea>
      </div>
      <button class="btn btn-danger" style="color: white;">
        <a style="text-decoration: none; color:white" href="/#contact">Send Message <i class="bi bi-chat-dots"></i></a>
    </button>
    </form>
    </div>
 </div>

 <div class="col-md-5 mt-5">
     
  </div>
@endsection