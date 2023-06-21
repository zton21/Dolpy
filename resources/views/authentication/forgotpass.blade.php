@extends('layout.auth-layout')

@section('title', 'Can\'t Log In? | Dolpy')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="px-5 text-center">
                <img src="{{ asset('img/logo-primary.png') }}" alt="Logo" class="img mh-25 mw-25" >
                <span class="h3 fw-bold mb-0">Dolpy</span>
            </div>
            <div class="text-center h3 mt-2 mb-3">Forgot Password</div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text row">
                                <div class="col-2">
                                    <svg width="32" height="42" viewBox="0 0 32 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 42C2.9 42 1.958 41.608 1.174 40.824C0.390003 40.04 -0.00132994 39.0987 3.39559e-06 38V18C3.39559e-06 16.9 0.392003 15.958 1.176 15.174C1.96 14.39 2.90134 13.9987 4 14H6V10C6 7.23333 6.97534 4.87467 8.926 2.924C10.8767 0.973335 13.2347 -0.00133197 16 1.36612e-06C18.7667 1.36612e-06 21.1253 0.975335 23.076 2.926C25.0267 4.87667 26.0013 7.23467 26 10V14H28C29.1 14 30.042 14.392 30.826 15.176C31.61 15.96 32.0013 16.9013 32 18V38C32 39.1 31.608 40.042 30.824 40.826C30.04 41.61 29.0987 42.0013 28 42H4ZM4 38H28V18H4V38ZM16 32C17.1 32 18.042 31.608 18.826 30.824C19.61 30.04 20.0013 29.0987 20 28C20 26.9 19.608 25.958 18.824 25.174C18.04 24.39 17.0987 23.9987 16 24C14.9 24 13.958 24.392 13.174 25.176C12.39 25.96 11.9987 26.9013 12 28C12 29.1 12.392 30.042 13.176 30.826C13.96 31.61 14.9013 32.0013 16 32ZM10 14H22V10C22 8.33333 21.4167 6.91667 20.25 5.75C19.0833 4.58333 17.6667 4 16 4C14.3333 4 12.9167 4.58333 11.75 5.75C10.5833 6.91667 10 8.33333 10 10V14Z" fill="#3980F3"/>
                                    </svg>
                                </div>
                                <div class="col-10 ps-0 my-auto" style="font-size: calc(0.7rem + 0.1vw) ;">
                                    Enter your email address and we’ll send you a link to reset your password.
                                </div>
                            </div>
                            <form action="{{ route('forgotpassword') }}" method="post">
                                @csrf
                                <div class="card-text my-4">
                                    <label for="EmailPassword" class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="EmailPassword" name="email" placeholder="name@example.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary mt-1">Send Recovery Link</button>
                                    <a href="{{ route('login') }}" class="link-black text-decoration-none btn btn-block btn-outline-dark mt-1 w-100">Back to Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection