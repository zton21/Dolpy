<style>
    .navbar-custom {
        height: 80px;
    }
    .text-primary-50 {color: #3980F3}
    .navbar {
        box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25);
    }
</style>

<nav class="navbar navbar-expand-sm navbar-light bg-white navbar-custom mb-2">
    <div class="container-fluid px-5">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('/img/logo-primary.png') }}" alt="Logo" height="40px">
            <div class="text-primary-50 fw-bold fs-4 ms-2">Dolpy</div>
        </a>
        <div class="d-flex flex-row">
            <form class="d-flex m-0">
                <input class="form-control me-2 my-2 d-sm-none d-md-block" type="search" placeholder="Search" aria-label="Search">
            </form>
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="#">H</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">N</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('setting') }}">S</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('img/profilePicture.png') }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </nav>