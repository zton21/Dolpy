<style>

</style>
<nav class="navbar navbar-expand-md navbar-light fixed-top w-100 transition-1 p-2">
    <div class="container"><div class="row w-100">
        {{-- Dolpy brand --}}
        <div class="col-md-2 col-sm-6 navbar-brand d-flex flex-row">
            <div style="width:2.5em; max-width:10vh;">
                <img src="{{URL::asset('img/logo.png')}}" alt="Logo" class="img-fluid">
            </div>
            <div class="text-neutral-10 fw-bold fs-3 ms-2" href="/index">Dolpy</div>
        </div>
        {{-- Collapse --}}
        <button class="ms-auto col-2 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navs" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Links --}}
        <div class="col-lg-4 col-md-6 mx-auto">
            <div class="row h-100">
                <a class="collapse navbar-collapse text-neutral-10 col-md-3 nav-item nav-link text-center my-auto navs" href="#benefit">
                    <div class="w-100">Benefits</div>
                </a>
                <a class="collapse navbar-collapse text-neutral-10 col-md-3 nav-item nav-link text-center my-auto navs" href="#feature">
                    <div class="w-100">Features</div>
                </a>
                <a class="collapse navbar-collapse text-neutral-10 col-md-3 nav-item nav-link text-center my-auto navs" href="#pricing">
                    <div class="w-100">Pricing</div>
                </a>
                <a class="collapse navbar-collapse text-neutral-10 col-md-3 nav-item nav-link text-center my-auto navs" href="#about">
                    <div class="w-100">About Us</div>
                </a>
            </div>
        </div>
        {{-- Register --}}
        <div class="col-md-2 my-auto">
            <a class="collapse navbar-collapse btn btn-primary nav-item nav-link my-auto px-md-2 px-lg-3 py-2 navs" href="#" role="button">
                <div class="text-center w-100">Get Started</div>
            </a>
        </div>
    </div></div>
</nav>


{{-- <nav class="navbar navbar-expand-sm navbar-light fixed-top w-100 transition-1">
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
    </div>
</nav>    --}}