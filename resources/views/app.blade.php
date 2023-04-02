<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/app.js')}}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light fixed-top w-100 transition-1">
        <div class="container d-flex justify-content-between w-100">
            <div class="flex-fill brand">
                <a class="navbar-brand" href="/index" >
                    Dolpy
                </a>
            </div>
            <div class="flex-fill collapse navbar-collapse" id="navigations">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <a class="nav-item nav-link {{Request::path() == 'feature' ? 'active' : '';}}" href="/feature">Features</a>
                    <a class="nav-item nav-link {{Request::path() == 'solution' ? 'active' : '';}}" href="/solution">Solution</a>
                    <a class="nav-item nav-link {{Request::path() == 'pricing' ? 'active' : '';}}" href="pricing">Pricing</a>
                    <a class="nav-item nav-link {{Request::path() == 'about' ? 'active' : '';}}" href="/about">About Us</a>
                </ul>
            </div>
            <div id="flex-fill logreg">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <a class="btn btn-primary nav-item nav-link" href="#" role="button">Get Started</a>
                </ul>
            </div>
            <button class="flex-fill navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations,#logreg" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>   

    <div class="container">
        @yield('content')
    </div>
</body>
</html>