@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">

      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <form action="/login" method="post">
              
              @csrf
              <div class="form-floating">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                @error('email')
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                      </div> 
                @enderror
              </div>
              <div class="form-floating">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>

            <small> Not registered? <a href="/register">Register now!</a></small>
        </main>
    </div>
</div>

  @endsection