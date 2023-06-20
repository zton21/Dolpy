@extends('layout.auth-layout')

@section('title', 'Log In | Dolpy')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="height:100vh">
  <div class="container">
    <div class="row h-100">
      <div class="col-md-6 col-sm-12 p-4 p-md-5 order-1 order-md-0">
        <div class="px-5 ms-xl-4 text-center">
          <img src="{{URL::asset('img/logo-primary.png')}}" alt="Logo" class="img mh-25 mw-25" >
          <span class="h3 fw-bold mb-0">Dolpy</span>
        </div>
        
        <h6 class="text-center">Login to your account</h6>
        
        <form method="POST" action="/login">
          @csrf
      <div class="form-group mt-2">
        <label for="email">Email</label>
        <div class="input-group">
          {{-- <span class="input-group-text" id="inputGroupPrepend2">@</span> --}}
          <input value="{{ old('email')}}" type="text" class="form-control form-control-sm" name="email" placeholder="johndoe@gmail.com">
        </div>
        </div>
        <div class="form-group mt-2">
          <label for="password">Password</label>
          <div class="input-group">
            <input value="" type="password" class="form-control form-control-sm" name="password" placeholder="*********" autocomplete="off">
          </div>
        </div>
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="d-flex justify-content-end mt-2">
          <a href="{{ route('forgotpassword') }}" class="link-primary text-decoration-none">Forgot password?</a>
        </div>
        <div class="d-grid gap-2 mt-2">
          <button class="btn btn-primary btn-block mt-4">Login</button>
          {{-- <button class="btn btn-block btn-light mt-3 shadow sm-5">Login with Google</button> --}}
        </div>
        <p class="text-center mt-2 mb-1">Don’t have an account? <a href="{{ route('register') }}" class="link-primary text-decoration-none">Register</a></h3>
        </form>
      </div>
      <div class="col-md-6 d-none d-md-block align-self-center order-0 order-md-1 ">
        <div class="px-5 mb-3 text-center">
          <h2>Boost Your Team Work Flexibility With <span class="text-primary">Dolpy</span></h2>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <img src="https://img.freepik.com/free-vector/coworking-concept-illustration_114360-5921.jpg?w=740&t=st=1680766027~exp=1680766627~hmac=f952d76faa53b358fa783c094826d45353c48244803d10299fc2e1f8b4245736"
              class="img-fluid w-75" alt="Coworking">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection