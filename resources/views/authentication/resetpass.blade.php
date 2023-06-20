@extends('layout.auth-layout')

@section('title', 'Reset Password | Dolpy')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="px-5 text-center">
                <img src="{{ URL::asset('img/logo-primary.png') }}" alt="Logo" class="img mh-25 mw-25" >
                <span class="h3 fw-bold mb-0">Dolpy</span>
            </div>
            <div class="text-center h3 mt-2 mb-3">Reset Password</div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Create New Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="New Password" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-block mt-1">Reset Password</button>
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