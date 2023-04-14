<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{URL::asset('css/rfs.css')}}" rel="stylesheet">
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
    @include('index.nav')
    <div class="section pb-5" id="header">
        @include('index.header')
    </div>
    <div class="section mx-md-0 mx-2 pb-5" id="benefit">
        @include('index.benefit')
    </div>
    {{-- <div class="section mx-md-0 mx-2" id="feature">
        @include('index.feature')
    </div> 
    <div class="section px-md-0 px-2" id="pricing">
        @include('index.pricing')
    </div> --}}
    <div class="section px-md-0 px-2" id="about">
        @include('index.about')
    </div>
    <div class="section px-md-0 px-2" id="footer">
        @include('index.footer')
    </div>

</body>
</html>