@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin w-100 m-auto">
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>  
          @endif
          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>  
          @endif
          @if(session()->has('logout'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('logout') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>  
          @endif
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <form action="/login" method="post">
              @csrf
              <div class="form-floating mb-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autofocus required>
                <label for="email">Email address</label>
                @error('email') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                <label for="password">Password</label>
              </div>
              <button class="btn btn-danger w-100 py-2 mt-3" type="submit">Login</button>
              <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
            </form>
        </main>       
    </div>
</div>

@endsection