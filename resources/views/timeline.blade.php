<!DOCTYPE html>
<html>
<head>
    <title>Board Page</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Styling --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/css/master.css" rel="stylesheet" >
    <link href="/css/dragndrop.css" rel="stylesheet" >
    <link href="/css/timeline.css" rel="stylesheet" >
    <link href="{{ asset('css/rfs.css') }}" rel="stylesheet">
    <script>$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});</script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        const project_id = {{$project->id}};
    </script>
    <style>
        #done .centang {opacity: 1;}
        .centang {opacity: 0; }
    </style>
</head>
<body>
@include('layout.project-nav', ['timelineActive' => "active"])
    <div class="container h-100" style="padding-top: 90px;">
        <div class="row mb-2 align-items-center">
            <div class="col-5 ps-0">
                <div class="card p-0 m-0">
                    <img src="{{URL::asset('img/WebProgrammingWallpaper.png')}}" class="img-fluid card-img-top">
                    <div class="card-body bg-primary-10">
                        <h3>{{ $project->projectName }}</h3>
                        <span>{{ $project->projectDescription }}</span>
                    </div>
                </div>
            </div>
            <div class="col-7 h-100">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                        <h3>Timeline Dashboard</h3>
                        <button onclick="openAddTimelineFormModal()" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                            <span class="text-white my-auto">Add Timeline Task</span>
                        </button>
                        <x-add-timeline-form></x-add-timeline-form>
                    </div>
                    <h5 class="my-3">Current completion:</h5>
                    <div class="d-flex flex-row justify-content-around my-auto">
                        <div class="flex-column text-center">
                            <h2 class='card-counter'>&nbsp;</h2>
                            cards completed
                        </div>
                        <div class="flex-column text-center">
                            <h2>{{$completed_task}}/{{$n_task}}</h2>
                            tasks completed
                        </div>
                        <div class="flex-column text-center">
                            <h2 class="card-progress"> {{$progress}}% </h2>
                            overall progress
                        </div>
                    </div>
                    <hr class="p-0 mt-3 m-0">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="pe-1 p-0 col-md-4">
                <div class="border rounded-3 bg-primary-5">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="d-flex flex-row p-2">
                            <div class="h3 todo">To Do <span class="badge rounded-pill text-bg-primary px-2 py-1 align-items-center" style="font-size: 0.5em"></span></div>
                        </div>
                        <div class="p-2">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1253_1400)"><path d="M22.5 10.75C24.2964 10.75 25.75 12.2036 25.75 14C25.75 15.7964 24.2964 17.25 22.5 17.25C20.7036 17.25 19.25 15.7964 19.25 14C19.25 12.2036 20.7036 10.75 22.5 10.75ZM22.5 15.4773C23.3155 15.4773 23.9773 14.8155 23.9773 14C23.9773 13.1845 23.3155 12.5227 22.5 12.5227C21.6845 12.5227 21.0227 13.1845 21.0227 14C21.0227 14.8155 21.6845 15.4773 22.5 15.4773Z" fill="#858487"/><path d="M14 10.75C15.7964 10.75 17.25 12.2036 17.25 14C17.25 15.7964 15.7964 17.25 14 17.25C12.2036 17.25 10.75 15.7964 10.75 14C10.75 12.2036 12.2036 10.75 14 10.75ZM14 15.4773C14.8155 15.4773 15.4773 14.8155 15.4773 14C15.4773 13.1845 14.8155 12.5227 14 12.5227C13.1845 12.5227 12.5227 13.1845 12.5227 14C12.5227 14.8155 13.1845 15.4773 14 15.4773Z" fill="#858487"/><path d="M5.5 10.75C7.29636 10.75 8.75 12.2036 8.75 14C8.75 15.7964 7.29636 17.25 5.5 17.25C3.70364 17.25 2.25 15.7964 2.25 14C2.25 12.2036 3.70364 10.75 5.5 10.75ZM5.5 15.4773C6.31545 15.4773 6.97727 14.8155 6.97727 14C6.97727 13.1845 6.31545 12.5227 5.5 12.5227C4.68455 12.5227 4.02273 13.1845 4.02273 14C4.02273 14.8155 4.68455 15.4773 5.5 15.4773Z" fill="#858487"/></g><defs><clipPath id="clip0_1253_1400"><rect width="28" height="28" fill="white" transform="matrix(-1 0 0 -1 28 28)"/></clipPath></defs></svg>
                        </div>
                    </div>
                    <div class="card_box" id="todo" style="min-height: 550px;">{{-- container drag  --}}
                        {{-- <a class="task_card text-decoration-none" id="1" draggable="true">
                            <div class="card shadow rounded-4 mx-3">
                                <div class="card-header rounded-top-4 bg-danger fs-4" style="height: 1em"></div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title task-title">Task1</h5>
                                    <p class="card-text task-description text-truncate m-0">every timeline cards will looks like this this this this this this</p>
                                    <hr class="p-0 my-3">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div class="d-flex flex-row align-items-center gap-1">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.75879 12.25L9.00879 13.5L12.3421 10.1666" stroke="#858487" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.33366 4.99996H11.667C13.3337 4.99996 13.3337 4.16663 13.3337 3.33329C13.3337 1.66663 12.5003 1.66663 11.667 1.66663H8.33366C7.50033 1.66663 6.66699 1.66663 6.66699 3.33329C6.66699 4.99996 7.50033 4.99996 8.33366 4.99996Z" stroke="#858487" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.3333 3.34998C16.1083 3.49998 17.5 4.52498 17.5 8.33331V13.3333C17.5 16.6666 16.6667 18.3333 12.5 18.3333H7.5C3.33333 18.3333 2.5 16.6666 2.5 13.3333V8.33331C2.5 4.53331 3.89167 3.49998 6.66667 3.34998" stroke="#858487" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <div style="color: #858487">5 tasks incoming</div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center gap-1">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.75879 12.25L9.00879 13.5L12.3421 10.1666" stroke="#858487" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.33366 4.99996H11.667C13.3337 4.99996 13.3337 4.16663 13.3337 3.33329C13.3337 1.66663 12.5003 1.66663 11.667 1.66663H8.33366C7.50033 1.66663 6.66699 1.66663 6.66699 3.33329C6.66699 4.99996 7.50033 4.99996 8.33366 4.99996Z" stroke="#858487" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.3333 3.34998C16.1083 3.49998 17.5 4.52498 17.5 8.33331V13.3333C17.5 16.6666 16.6667 18.3333 12.5 18.3333H7.5C3.33333 18.3333 2.5 16.6666 2.5 13.3333V8.33331C2.5 4.53331 3.89167 3.49998 6.66667 3.34998" stroke="#858487" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <div style="color: #858487">start at 10/8/2023 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="px-1 col-md-4">
                <div class="border rounded-3 bg-primary-5" >
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="d-flex flex-row p-2">
                            <div class="h3 onprogress">On Progress <span class="badge rounded-pill text-bg-primary px-2 py-1" style="font-size: 0.5em"></span></div>
                        </div>
                        <div class="p-2">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1253_1400)"><path d="M22.5 10.75C24.2964 10.75 25.75 12.2036 25.75 14C25.75 15.7964 24.2964 17.25 22.5 17.25C20.7036 17.25 19.25 15.7964 19.25 14C19.25 12.2036 20.7036 10.75 22.5 10.75ZM22.5 15.4773C23.3155 15.4773 23.9773 14.8155 23.9773 14C23.9773 13.1845 23.3155 12.5227 22.5 12.5227C21.6845 12.5227 21.0227 13.1845 21.0227 14C21.0227 14.8155 21.6845 15.4773 22.5 15.4773Z" fill="#858487"/><path d="M14 10.75C15.7964 10.75 17.25 12.2036 17.25 14C17.25 15.7964 15.7964 17.25 14 17.25C12.2036 17.25 10.75 15.7964 10.75 14C10.75 12.2036 12.2036 10.75 14 10.75ZM14 15.4773C14.8155 15.4773 15.4773 14.8155 15.4773 14C15.4773 13.1845 14.8155 12.5227 14 12.5227C13.1845 12.5227 12.5227 13.1845 12.5227 14C12.5227 14.8155 13.1845 15.4773 14 15.4773Z" fill="#858487"/><path d="M5.5 10.75C7.29636 10.75 8.75 12.2036 8.75 14C8.75 15.7964 7.29636 17.25 5.5 17.25C3.70364 17.25 2.25 15.7964 2.25 14C2.25 12.2036 3.70364 10.75 5.5 10.75ZM5.5 15.4773C6.31545 15.4773 6.97727 14.8155 6.97727 14C6.97727 13.1845 6.31545 12.5227 5.5 12.5227C4.68455 12.5227 4.02273 13.1845 4.02273 14C4.02273 14.8155 4.68455 15.4773 5.5 15.4773Z" fill="#858487"/></g><defs><clipPath id="clip0_1253_1400"><rect width="28" height="28" fill="white" transform="matrix(-1 0 0 -1 28 28)"/></clipPath></defs></svg>
                        </div>
                    </div>
                    <div class="card_box" id="onprogress" style="min-height: 550px;">
                        {{-- <a class="task_card text-decoration-none" id="2" draggable="true">
                            <div class="card shadow rounded-4 mx-3">
                                <div class="card-header rounded-top-4 bg-danger fs-4" style="height: 1em"></div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Task2</h5>
                                    <p class="card-text text-truncate m-0">every timeline cards will looks like this this this this this this </p>
                                    <hr class="p-0 my-3">
                                    <div class="d-flex flex-row justify-content-between gap-2">
                                        <div class="d-flex flex-row align-items-center gap-1">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.75879 12.25L9.00879 13.5L12.3421 10.1666" stroke="#379436" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.33366 4.99996H11.667C13.3337 4.99996 13.3337 4.16663 13.3337 3.33329C13.3337 1.66663 12.5003 1.66663 11.667 1.66663H8.33366C7.50033 1.66663 6.66699 1.66663 6.66699 3.33329C6.66699 4.99996 7.50033 4.99996 8.33366 4.99996Z" stroke="#379436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.3333 3.34998C16.1083 3.49998 17.5 4.52498 17.5 8.33331V13.3333C17.5 16.6666 16.6667 18.3333 12.5 18.3333H7.5C3.33333 18.3333 2.5 16.6666 2.5 13.3333V8.33331C2.5 4.53331 3.89167 3.49998 6.66667 3.34998" stroke="#379436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <div style="color: #379436">1/5</div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center gap-1">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.66699 1.66663V4.16663" stroke="#379436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.333 1.66663V4.16663" stroke="#379436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M2.91699 7.57495H17.0837" stroke="#379436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M17.5 7.08329V14.1666C17.5 16.6666 16.25 18.3333 13.3333 18.3333H6.66667C3.75 18.3333 2.5 16.6666 2.5 14.1666V7.08329C2.5 4.58329 3.75 2.91663 6.66667 2.91663H13.3333C16.25 2.91663 17.5 4.58329 17.5 7.08329Z" stroke="#379436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.0791 11.4167H13.0866" stroke="#379436" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.0791 13.9167H13.0866" stroke="#379436" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.99607 11.4167H10.0036" stroke="#379436" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.99607 13.9167H10.0036" stroke="#379436" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6.91209 11.4167H6.91957" stroke="#379436" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6.91209 13.9167H6.91957" stroke="#379436" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                
                                            <div style="color: #379436">end at 30/7/2023</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>     --}}
                    </div>
                </div>
            </div>
            <div class="ps-1 p-0 col-md-4">
                <div class="border rounded-3" style="background: #F3F8FE">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-row p-2">
                        <div class="h3 done">Done <span class="badge rounded-pill text-bg-primary px-2 py-1" style="font-size: 0.5em"></span></div>
                    </div>
                    <div class="p-2">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1253_1400)"><path d="M22.5 10.75C24.2964 10.75 25.75 12.2036 25.75 14C25.75 15.7964 24.2964 17.25 22.5 17.25C20.7036 17.25 19.25 15.7964 19.25 14C19.25 12.2036 20.7036 10.75 22.5 10.75ZM22.5 15.4773C23.3155 15.4773 23.9773 14.8155 23.9773 14C23.9773 13.1845 23.3155 12.5227 22.5 12.5227C21.6845 12.5227 21.0227 13.1845 21.0227 14C21.0227 14.8155 21.6845 15.4773 22.5 15.4773Z" fill="#858487"/><path d="M14 10.75C15.7964 10.75 17.25 12.2036 17.25 14C17.25 15.7964 15.7964 17.25 14 17.25C12.2036 17.25 10.75 15.7964 10.75 14C10.75 12.2036 12.2036 10.75 14 10.75ZM14 15.4773C14.8155 15.4773 15.4773 14.8155 15.4773 14C15.4773 13.1845 14.8155 12.5227 14 12.5227C13.1845 12.5227 12.5227 13.1845 12.5227 14C12.5227 14.8155 13.1845 15.4773 14 15.4773Z" fill="#858487"/><path d="M5.5 10.75C7.29636 10.75 8.75 12.2036 8.75 14C8.75 15.7964 7.29636 17.25 5.5 17.25C3.70364 17.25 2.25 15.7964 2.25 14C2.25 12.2036 3.70364 10.75 5.5 10.75ZM5.5 15.4773C6.31545 15.4773 6.97727 14.8155 6.97727 14C6.97727 13.1845 6.31545 12.5227 5.5 12.5227C4.68455 12.5227 4.02273 13.1845 4.02273 14C4.02273 14.8155 4.68455 15.4773 5.5 15.4773Z" fill="#858487"/></g><defs><clipPath id="clip0_1253_1400"><rect width="28" height="28" fill="white" transform="matrix(-1 0 0 -1 28 28)"/></clipPath></defs></svg>
                    </div>
                </div>
                <div class="card_box" id="done" style="min-height: 550px;">
                    {{-- @for($x=0; $x<3; $x++) --}}
                    <a class="task_card d-none text-decoration-none" id="3" draggable="true">
                        <div class="card rounded-4 mx-3 shadow">
                            <div class="card-header rounded-top-4 fs-4 card-color" style="height: 1em"></div>
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex flex-row card-title align-items-center gap-2">
                                    <h5 class="m-0 task_title">Task 3</h5>
                                    <div class="centang">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1428_1163)">
                                            <mask id="mask0_1428_1163" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="18" height="18">
                                            <path d="M9.00001 16.5C9.98511 16.5013 10.9607 16.3079 11.8709 15.9309C12.781 15.5539 13.6076 15.0007 14.3033 14.3033C15.0007 13.6076 15.5539 12.781 15.9309 11.8709C16.3079 10.9607 16.5013 9.98511 16.5 9.00001C16.5013 8.01491 16.3078 7.03927 15.9308 6.12917C15.5539 5.21906 15.0007 4.39242 14.3033 3.69676C13.6076 2.99927 12.781 2.44613 11.8709 2.06914C10.9607 1.69215 9.98511 1.49873 9.00001 1.50001C8.01491 1.49875 7.03927 1.69218 6.12917 2.06917C5.21906 2.44616 4.39242 2.99928 3.69676 3.69676C2.99928 4.39242 2.44616 5.21906 2.06917 6.12917C1.69218 7.03927 1.49875 8.01491 1.50001 9.00001C1.49873 9.98511 1.69215 10.9607 2.06914 11.8709C2.44613 12.781 2.99927 13.6076 3.69676 14.3033C4.39242 15.0007 5.21906 15.5539 6.12917 15.9308C7.03927 16.3078 8.01491 16.5013 9.00001 16.5Z" fill="white" stroke="white" stroke-width="2.5" stroke-linejoin="round"/>
                                            <path d="M6 9L8.25 11.25L12.75 6.75" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </mask>
                                            <g mask="url(#mask0_1428_1163)">
                                            <path d="M0 0H18V18H0V0Z" fill="#4FD34D"/>
                                            </g>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_1428_1163">
                                            <rect width="18" height="18" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </div>                          
                                </div>
                                <p class="card-text task_desc text-truncate m-0">every timeline cards will looks like this this this this this this </p>
                                <hr class="p-0 my-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="d-flex flex-row align-items-center gap-1">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.75879 12.25L9.00879 13.5L12.3421 10.1666" stroke="#3980F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.33366 4.99996H11.667C13.3337 4.99996 13.3337 4.16663 13.3337 3.33329C13.3337 1.66663 12.5003 1.66663 11.667 1.66663H8.33366C7.50033 1.66663 6.66699 1.66663 6.66699 3.33329C6.66699 4.99996 7.50033 4.99996 8.33366 4.99996Z" stroke="#3980F3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.3333 3.34998C16.1083 3.49998 17.5 4.52498 17.5 8.33331V13.3333C17.5 16.6666 16.6667 18.3333 12.5 18.3333H7.5C3.33333 18.3333 2.5 16.6666 2.5 13.3333V8.33331C2.5 4.53331 3.89167 3.49998 6.66667 3.34998" stroke="#3980F3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div class="text-primary-50 task_progress">5/5</div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center gap-1">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.75879 12.25L9.00879 13.5L12.3421 10.1666" stroke="#3980F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.33366 4.99996H11.667C13.3337 4.99996 13.3337 4.16663 13.3337 3.33329C13.3337 1.66663 12.5003 1.66663 11.667 1.66663H8.33366C7.50033 1.66663 6.66699 1.66663 6.66699 3.33329C6.66699 4.99996 7.50033 4.99996 8.33366 4.99996Z" stroke="#3980F3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.3333 3.34998C16.1083 3.49998 17.5 4.52498 17.5 8.33331V13.3333C17.5 16.6666 16.6667 18.3333 12.5 18.3333H7.5C3.33333 18.3333 2.5 16.6666 2.5 13.3333V8.33331C2.5 4.53331 3.89167 3.49998 6.66667 3.34998" stroke="#3980F3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div class="text-primary-50 task_duedate">end at 10/2/2023</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    {{-- @endfor --}}
                {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="/js/dragndorp.js"></script>
</body>
</html>