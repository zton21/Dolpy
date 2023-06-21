@extends('layout.auth-layout')

@section('title', 'Register For Free | Dolpy')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
  <div class="container">
    <div class="row h-100">
      <div class="col-md-6 d-none d-md-block p-4 p-md-5 align-items-center order-0">
        <div class="px-3 mb-3 text-center">
            <h2>Boost Your Team Work Flexibility With <span class="text-primary">Dolpy</span></h2>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <img src="https://img.freepik.com/free-vector/team-goals-concept-illustration_114360-5146.jpg?w=740&t=st=1680949973~exp=1680950573~hmac=2f977442106cce0d79b6481343221fe1bc8705a6d8f3eee7e2663b0a12b48a5f"
                class="img-fluid w-75" alt="Coworking">
        </div>
      </div>
      <div class="col-md-6 col-sm-12 p-3 p-md-5 order-1">
        <div class="px-5 mb-3 text-center">
          <img src="{{URL::asset('img/logo-primary.png')}}" alt="Logo" class="img-fluid" >
          <span class="h3 fw-bold mb-0">Dolpy</span>
        </div>

        <h6 class="text-center">Register your account</h6>
        
        <form class="row mt-3" action="{{ route('register') }}" method="POST">
          @csrf
          <div class="col">
            <label for="inputFirstName">First Name</label>
            <input type="text" class="form-control form-control-sm" name="firstName" id="inputFirstName" placeholder="Enter your first name" value="{{old('firstName')}}">
            @error('firstName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col">
            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control form-control-sm" name="lastName" id="inputLastName" placeholder="Enter your last name" value="{{old('lastName')}}">
            @error('firstName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mt-2">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="tel" class="form-control form-control-sm" name="phone" id="inputPhoneNumber" placeholder="Enter your phone number" value="{{old('phone')}}">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mt-2">
            <label for="inputEmail">Email address</label>
            <input type="text" class="form-control form-control-sm" name="email" id="inputEmail" placeholder="johndoe@gmail.com" value="{{old('email')}}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mt-2">
            <label for="inputPassword">Password</label>
            <div class="input-icon">
            <input type="password" class="form-control form-control-sm" name="password" id="inputPassword" value="" placeholder="**********">
            <i class="fa fa-key"></i>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection