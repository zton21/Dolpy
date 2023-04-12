<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{URL::asset('css/index.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/index.js')}}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolpy</title>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="0" tabindex="0">
    <nav class="navbar navbar-expand-sm navbar-light fixed-top w-100 transition-1">
        <div class="container justify-content-between w-100 px-0 py-1">
            <div class="brand">
                <a class="text-neutral-10 navbar-brand fw-bold fs-3" href="/index" >
                    <div class="d-inline-block" style="max-width:8vh;">
                        <img src="{{URL::asset('img/logo.png')}}" alt="Logo" class="img-fluid" >
                    </div>
                    <div class="d-inline ms-2">Dolpy</div> 
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navigations">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <a class="text-neutral-10 nav-item nav-link" href="#benefit">Benefits</a>
                    <a class="text-neutral-10 nav-item nav-link" href="#feature">Features</a>
                    <a class="text-neutral-10 nav-item nav-link" href="#pricing">Pricing</a>
                    <a class="text-neutral-10 nav-item nav-link" href="#about">About Us</a>
                </ul>
            </div>
            <div id="logreg">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <a class="px-4 btn btn-primary nav-item nav-link" href="#" role="button">Get Started</a>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations,#logreg" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>   

    <div class="section" id="header">
        @include('subviews.header')
    </div>
    <div class="section" id="benefit">
        @include('subviews.benefit')
    </div>
    <div class="section" id="feature">
        @include('subviews.feature')
    </div>
    <div class="section" id="pricing">
        @include('subviews.pricing')
    </div>
    <div class="section h-auto" id="about">
        @include('subviews.about')
    </div>
    <div class="section h-auto" id="footer">
        @include('subviews.footer')
    </div>

</body>
</html>