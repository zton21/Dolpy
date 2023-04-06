
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dolpy</title>
  <style>
    form input+i{
      position:absolute;
      left:7px;
      top:10px;
      color:#777;
    }

    form,form .input-icon{width:100%;}
    form .input-icon{position:relative;}
    /* div{
        border: 1px solid black;
    } */
</style>
</head>
<body>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-6">
        
        <div class="px-5 ms-xl-4 text-center">
          <i class="fa fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h3 fw-bold mb-0">Dolpy</span>
        </div>
        
        <form>
          <div class="form-group mt-5">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email...">
          </div>
          <div class="form-group mt-3">
            <label for="inputPassword">Password</label>
            <div class="input-icon">
              <input type="password" class="form-control" id="exampleInputPassword" placeholder="Enter your password...">
              <i class="fa fa-key"></i>
              {{-- <span style="opacity: 0">ini error</span> --}}
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <a href="#!">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
          <button type="submit" class="btn btn-block btn-light mt-4">Login with Google</button>
        </form>
      </div>
      <div class="col-md-6 align-middle">
        <h3 class="text-center mb-1">Boost your team work flexibility with <span class="text-primary">Dolpy</span></h3>
        {{-- <div class="col-md-8 col-lg-7 col-xl-6"> --}}
          <img src="https://img.freepik.com/free-vector/coworking-concept-illustration_114360-5921.jpg?w=740&t=st=1680766027~exp=1680766627~hmac=f952d76faa53b358fa783c094826d45353c48244803d10299fc2e1f8b4245736"
            class="img-fluid" alt="Coworking">
        {{-- </div> --}}
      </div>
    </div>
  </div>
</body>
</html>
