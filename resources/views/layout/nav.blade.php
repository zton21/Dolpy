<style>
    .navbar-custom {
        height: 80px;
    }
</style>

<nav class="navbar navbar-expand-sm navbar-light bg-white navbar-custom">
    <div class="container-fluid px-5">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('/img/logo-primary.png') }}" alt="Logo" class="img-fluid">
            <div class="text-primary-50 fw-bold fs-3 ms-2">Dolpy</div>
        </a>
        <form class="d-flex">
          <input class="form-control me-2 xs:d-none" type="search" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">H</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">N</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">S</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="{{ asset('path/to/your/profile.jpg') }}" alt="Profile"></a>
            </li>
        </ul>
    </div>
  </nav>