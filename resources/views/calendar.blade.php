{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
</head>
<body>
    @include('layout.nav') --}}

@extends('layout.master')
@section('title', 'Dolpy Calendar')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="border-start border-5 border-primary pr-3 rounded-2" style="width: 68%; background: #F3F8FE">
                <div class="row d-flex justify-content-around p-2" style="height: 12vh;">
                    <div class="col-9 p">
                        <h4 class="m-0">Montly</h4>
                        <h1 class="m-0">
                            <span style="color:blue">User very long</span> Event calendar
                        </h1>
                    </div>
                    <div class="col-3 d-flex flex-column justify-content-around align-items-center">
                        <button type="button" class="btn btn-primary" style="width: 10vw">Today</button>
                        <div class="d-flex flex-row align-items-center">
                            <a href="">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.20035 12.0004C7.20035 11.3004 7.47035 10.6004 8.00035 10.0704L14.5204 3.55039C14.8104 3.26039 15.2904 3.26039 15.5804 3.55039C15.8704 3.84039 15.8704 4.32039 15.5804 4.61039L9.06035 11.1304C8.58035 11.6104 8.58035 12.3904 9.06035 12.8704L15.5804 19.3904C15.8704 19.6804 15.8704 20.1604 15.5804 20.4504C15.2904 20.7404 14.8104 20.7404 14.5204 20.4504L8.00035 13.9304C7.47035 13.4004 7.20035 12.7004 7.20035 12.0004Z" fill="#858487"/>
                                </svg>
                            </a>
                            <h4 class="m-0">bulan 2023</h4>
                            <a href="">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.1082 11.9996C17.1082 12.6996 16.8382 13.3996 16.3082 13.9296L9.78824 20.4496C9.49824 20.7396 9.01824 20.7396 8.72824 20.4496C8.43824 20.1596 8.43824 19.6796 8.72824 19.3896L15.2482 12.8696C15.7282 12.3896 15.7282 11.6096 15.2482 11.1296L8.72824 4.60962C8.43824 4.31961 8.43824 3.83961 8.72824 3.54961C9.01824 3.25961 9.49824 3.25961 9.78824 3.54961L16.3082 10.0696C16.8382 10.5996 17.1082 11.2996 17.1082 11.9996Z" fill="#858487"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="pr-3 rounded-2" style="width: 30%; background: #F3F8FE">
                <h4 class="m-0">
                    <span style="color:blue">31 September</span> events:
                </h4>
                {{-- @foreach ($collection as $item)
                    
                @endforeach --}}
                <div style="height: 10vh; overflow-y: auto;">
                    <div class="d-flex flex-column align-content-around text-start">
                        <div class="bg-primary my-1 px-2 rounded-2" style="width:95%; height:3vh">
                            <p class="m-0 text-light">hello world</p>
                        </div>
                        <div class="bg-primary my-1 px-2 rounded-2" style="width:95%; height:3vh"></div>
                        <div class="bg-primary my-1 px-2 rounded-2" style="width:95%; height:3vh"></div>
                        <div class="bg-primary my-1 px-2 rounded-2" style="width:95%; height:3vh"></div>
                        <div class="bg-primary my-1 px-2 rounded-2" style="width:95%; height:3vh"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container text-center" style="color: #88B3F8">
        <div class="row">
            <div class="col">Sunday</div>
            <div class="col">Monday</div>
            <div class="col">Tuesday</div>
            <div class="col">Wednesday</div>
            <div class="col">Thrusday</div>
            <div class="col">Friday</div>
            <div class="col">Saturday</div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row" style="height: 15vh">
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">
                <p class="m-0">1</p>
                <div class="row d-flex flex-column align-content-around text-start" style="height: 10vh">
                    <div class="col bg-primary my-1 rounded-2" style="width:95%">
                        <p class="m-0 text-light">hello world</p>
                    </div>
                    <div class="col bg-primary my-1 rounded-2" style="width:95%"></div>
                    <div class="col bg-primary my-1 rounded-2" style="width:95%"></div>
                </div>
            </div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
        </div>
        <div class="row" style="height: 12vh">
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
        </div>
        <div class="row" style="height: 12vh">
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
        </div>
        <div class="row" style="height: 12vh">
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
        </div>
        <div class="row" style="height: 12vh">
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
            <div class="col" style="border: 1px solid #88B3F8; color:#3980F3">1</div>
        </div>
    </div>
@endsection