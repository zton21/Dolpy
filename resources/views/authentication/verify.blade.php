@extends('layout.auth-layout')

@section('title', 'Verify Email | Dolpy')

@section('content')
<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Verify Your Email Address</div>

                <div class="card-body">
                    @if (session('emailSent'))
                        <div class="alert alert-success" role="alert">
                            Recovery link sent to your email. Please check your inbox.
                        </div>
                    @endif

                    @if (session('reset_email'))
                        If you did not receive the email for {{ session('reset_email') }},
                        <form class="d-inline" method="POST" action="{{ route('resendResetEmail') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection