
<!DOCTYPE html>
<html lang="en">
  <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> 
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login</title>
      <style>
          /* div{
              border: 1px solid black;
          } */
      </style>
  </head>
  <body>
    <div class="d-flex align-items-center justify-content-center" style="height:100vh">
      <div class="container">
        <div class="row h-100">
          <div class="col-lg-6 col-md-6 col-sm-12 p-4 p-md-5 order-1 order-md-0">
            <div class="px-5 ms-xl-4 text-center">
              <img src="{{URL::asset('img/logo_blue.png')}}" alt="Logo" class="img mh-25 mw-25" >
              <span class="h3 fw-bold mb-0">Dolpy</span>
            </div>
            
            <h6 class="text-center">Login to your account</h6>
            
            <form method="POST" action="/login">
              @csrf
          <div class="form-group mt-2">
            <label for="email">Email address</label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend2">@</span>
              <input value="{{ old('email')}}" type="email" class="form-control  form-control-sm" name="email" placeholder="Enter your email...">
            </div>
            </div>
            <div class="form-group mt-2">
              <label for="password">Password</label>
              <div class="input-group">
                <input value="" type="password" class="form-control  form-control-sm" name="password" placeholder="Enter your password...">
                <p class="fa fa-key p-2 m-0"></i>
              </div>
            </div>
            @error('username')
              <span style="color: red">Invalid credentials.</span>
            @enderror
            <div class="d-flex justify-content-end mt-2">
              <a href="#!">Forgot password?</a>
            </div>
            <div class="d-grid gap-2 mt-2">
              <button class="btn btn-primary btn-block mt-4">Login</button>
              <button class="btn btn-block btn-light mt-3 shadow sm-5">Login with Google</button>
            </div>
            <p class="text-center mt-2 mb-1">Don’t have an account? <span class="text-primary"><a href="/register">Register</a></span></h3>
            </form>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 align-self-center order-0 order-md-1 ">
            <div class="px-5 mb-3 text-center">
              <h2>Boost your team work flexibility with <span class="text-primary">Dolpy</span></h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <img src="https://img.freepik.com/free-vector/coworking-concept-illustration_114360-5921.jpg?w=740&t=st=1680766027~exp=1680766627~hmac=f952d76faa53b358fa783c094826d45353c48244803d10299fc2e1f8b4245736"
                  class="img-fluid w-75" alt="Coworking">
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>