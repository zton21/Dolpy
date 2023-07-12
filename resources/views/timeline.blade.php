<!DOCTYPE html>
<html>
<head>
    <title>Board Page</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="/css/master.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .card {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    
@include('layout.project-nav', ['timelineActive' => "active"])
    <div class="container" style="padding-top: 90px;">
        <div class="row">
            <div class="col-5">
                <div class="card p-0">
                    <img src="{{URL::asset('img/WebProgrammingWallpaper.png')}}" class="img-fluid card-img-top">
                    <div class="card-body bg-primary-10">
                        <h3>Web Programming</h3>
                        <span>Every Project has it own card too</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-row justify-content-between">
                    <h3>Timeline Dashboard</h3>
                    <button onclick="openAddTimelineFormModal()" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                        <span class="text-white my-auto">Add Timeline</span>
                    </button>
                    <x-add-timeline-form></x-add-timeline-form>
                </div>
                <h5>Current completion:</h5>
                <div class="d-flex flex-row justify-content-around">
                    <div class="flex-column text-center">
                        <h2>1/5</h2>
                        cards completed
                    </div>
                    <div class="flex-column text-center">
                        <h2>10/20</h2>
                        tasks completed
                    </div>
                    <div class="flex-column text-center">
                        <h2>28%</h2>
                        overall progress
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 border rounded-3 bg-primary-5">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-row p-2">
                        <div class="h3">To Do <span class="badge rounded-pill text-bg-primary px-2 py-1" style="font-size: 0.5em">3</span></div>
                        
                    </div>
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1253_1400)"><path d="M22.5 10.75C24.2964 10.75 25.75 12.2036 25.75 14C25.75 15.7964 24.2964 17.25 22.5 17.25C20.7036 17.25 19.25 15.7964 19.25 14C19.25 12.2036 20.7036 10.75 22.5 10.75ZM22.5 15.4773C23.3155 15.4773 23.9773 14.8155 23.9773 14C23.9773 13.1845 23.3155 12.5227 22.5 12.5227C21.6845 12.5227 21.0227 13.1845 21.0227 14C21.0227 14.8155 21.6845 15.4773 22.5 15.4773Z" fill="#858487"/><path d="M14 10.75C15.7964 10.75 17.25 12.2036 17.25 14C17.25 15.7964 15.7964 17.25 14 17.25C12.2036 17.25 10.75 15.7964 10.75 14C10.75 12.2036 12.2036 10.75 14 10.75ZM14 15.4773C14.8155 15.4773 15.4773 14.8155 15.4773 14C15.4773 13.1845 14.8155 12.5227 14 12.5227C13.1845 12.5227 12.5227 13.1845 12.5227 14C12.5227 14.8155 13.1845 15.4773 14 15.4773Z" fill="#858487"/><path d="M5.5 10.75C7.29636 10.75 8.75 12.2036 8.75 14C8.75 15.7964 7.29636 17.25 5.5 17.25C3.70364 17.25 2.25 15.7964 2.25 14C2.25 12.2036 3.70364 10.75 5.5 10.75ZM5.5 15.4773C6.31545 15.4773 6.97727 14.8155 6.97727 14C6.97727 13.1845 6.31545 12.5227 5.5 12.5227C4.68455 12.5227 4.02273 13.1845 4.02273 14C4.02273 14.8155 4.68455 15.4773 5.5 15.4773Z" fill="#858487"/></g><defs><clipPath id="clip0_1253_1400"><rect width="28" height="28" fill="white" transform="matrix(-1 0 0 -1 28 28)"/></clipPath></defs></svg>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Task1</h5>
                        <p class="card-text">Ini description Task 1 </p>
                        <p class="card-text">Start Date: 22-06-2023</p>
                        <p class="card-text">Due Date: 04-07-2023</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary-5">
                    <div class="card-header">
                        <h3>In Progress</h3>
                        <div class="badge rounded-pill text-bg-primary">3</div>
                        
                    </div>
                    <div class="card-body" id="in-progress">
                        <div class="card" data-task-id="2">
                            <div class="card-body">
                                <h5 class="card-title">Task2</h5>
                                <p class="card-text">Ini description Task 2 </p>
                                <p class="card-text">Start Date: 22-06-2023</p>
                                <p class="card-text">Due Date: 04-07-2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header h3">Done</div>
                    <div class="card-body" id="done">
                        <div class="card" data-task-id="3">
                            <div class="card-body">
                                <h5 class="card-title">Task3</h5>
                                <p class="card-text">Ini description Task 3</p>
                                <p class="card-text">Start Date: 22-06-2023</p>
                                <p class="card-text">Due Date: 04-07-2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="done">
                        <div class="card" data-task-id="3">
                            <div class="card-body">
                                <h5 class="card-title">Task3</h5>
                                <p class="card-text">Ini description Task 3</p>
                                <p class="card-text">Start Date: 22-06-2023</p>
                                <p class="card-text">Due Date: 04-07-2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="done">
                        <div class="card" data-task-id="3">
                            <div class="card-body">
                                <h5 class="card-title">Task3</h5>
                                <p class="card-text">Ini description Task 3</p>
                                <p class="card-text">Start Date: 22-06-2023</p>
                                <p class="card-text">Due Date: 04-07-2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- </body>
</html> --}}