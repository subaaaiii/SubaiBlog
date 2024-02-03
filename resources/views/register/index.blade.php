@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
            <form action="/register" method="POST">
                @csrf
              <div class="form-floating mb-2">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name') }}" required>
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" name="username" value="{{ old('username') }}" required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <button class="btn btn-danger w-100 py-2 mt-3" type="submit">Register</button>
              <small class="d-block text-center mt-3">Already Have an Account? <a href="/login">Login Now!</a></small>
            </form>
        </main>       
    </div>
</div>

@endsection