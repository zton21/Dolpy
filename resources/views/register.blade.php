<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
      /* div{
          border: 1px solid black;
      } */
      .error {
        color:red;
      }
    </style>
  </head>
  <body>
    <div class="d-flex align-items-center justify-content-center" style="height:100vh">
      <div class="container">
        <div class="row h-100">
          <div class="col-lg-6 col-md-6 col-sm-12 p-4 p-md-5 align-items-center order-0">
            <div class="px-5 mb-3 text-center">
                <h2>Boost your team work flexibility with <span class="text-primary">Dolpy</span></h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <img src="https://img.freepik.com/free-vector/team-goals-concept-illustration_114360-5146.jpg?w=740&t=st=1680949973~exp=1680950573~hmac=2f977442106cce0d79b6481343221fe1bc8705a6d8f3eee7e2663b0a12b48a5f"
                    class="img-fluid w-75" alt="Coworking">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 p-3 p-md-5 order-1">
            <div class="px-5 ms-xl-4 mb-3 text-center">
              <img src="{{URL::asset('img/logo_blue.png')}}" alt="Logo" class="img-fluid" >
              <span class="h3 fw-bold mb-0">Dolpy</span>
            </div>

            <h6 class="text-center">Register your account</h6>
            
            <form class="row mt-3" method="post">
              @csrf
              <div class="col">
                <label for="inputFirstName">First Name</label>
                <input type="text" class="form-control form-control-sm" name="name" id="inputFirstName" placeholder="First name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    {{-- @foreach ($errors->get('name') as $message)
                        <span style="color:red">{{ $message }}</span><br>
                    @endforeach --}}
                    <span class="error"><small>Nama aja ga bener</small></span>
                @endif
              </div>
              <div class="col">
                <label for="inputLastName">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="name2" id="inputLastName" placeholder="Last name" value="{{old('name2')}}">
                @if ($errors->has('name2'))
                    {{-- @foreach ($errors->get('name2') as $message)
                        <span class="error">{{ $message }}</span><br>
                    @endforeach --}}
                    <span class="error"><small>Apalagi hiduplu :p</small></span>
                @endif
              </div>
              <div class="form-group mt-2">
                <label for="inputPhoneNumber">Phone Number</label>
                <input type="tel" class="form-control form-control-sm" name="phone" id="inputPhoneNumber" placeholder="Enter your phone number..." value="{{old('phone')}}">
                @if ($errors->has('phone'))
                    {{-- @foreach ($errors->get('phone') as $message)
                        <span class="error">{{ $message }}</span><br>
                    @endforeach --}}
                    <span class="error"><small>Ngapain palsuin, ga bakal gw chat ~</small></span>
                @endif
              </div>
              <div class="form-group mt-2">
                <label for="inputEmail">Email address</label>
                <input type="email" class="form-control form-control-sm" name="email" id="inputEmail" placeholder="johndoe@gmail.com" value="{{old('email')}}">
                @if ($errors->has('email'))
                    {{-- @foreach ($errors->get('email') as $message)
                        <span class="error">{{ $message }}</span><br>
                    @endforeach --}}
                    <span class="error"><small>Email ya email.</small></span>
                @endif
              </div>
              <div class="form-group mt-2">
                <label for="inputPassword">Password</label>
                <div class="input-icon">
                <input type="password" class="form-control form-control-sm" name="password" id="inputPassword" value="" placeholder="**********">
                <i class="fa fa-key"></i>
                @if ($errors->has('password'))
                    {{-- @foreach ($errors->get('password') as $message)
                        <span class="error">{{ $message }}</span><br>
                    @endforeach --}}
                    <span class="error"><small>Mau digebuk pak Yohan?</small></span>
                @endif
                </div>
              </div>
              <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
              <p class="text-center mt-3">Already have an account? <span class="text-primary"><a href="/login">Login</a></span></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>