<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>timeline-(taskname)</title>
    
    {{-- Styling --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/css/master.css" rel="stylesheet">
    <link href="/css/timeline.css" rel="stylesheet" >
    <link href="{{ asset('css/rfs.css') }}" rel="stylesheet">
    <script src="/js/timelineinner.js"></script>
</head>

<body>
@include('layout.project-nav', ['timelineActive' => "active"])
    <div class="container" style="padding-top: 90px;">
        <div class="row py-2 mt-3">
            <div class="col-8">
                <h1>{{$task->timelineTitle}}</h1>
                <p>{{$task->timelineDesc}}</p>
            </div>
            <div class="col-4 text-end">
                <button class="btn btn-primary mb-3"  data-bs-toggle="modal" data-bs-target="#task-note-modal" data-action="create" data-timeline-id="{{ $task->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                    <span class="text-white my-auto">Add Task Note</span>
                </button>
                @include('components.task-note-form')
                <div>
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2.5V6.25" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 2.5V6.25" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.375 11.3625H25.625" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26.25 10.625V21.25C26.25 25 24.375 27.5 20 27.5H10C5.625 27.5 3.75 25 3.75 21.25V10.625C3.75 6.875 5.625 4.375 10 4.375H20C24.375 4.375 26.25 6.875 26.25 10.625Z" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.6181 17.125H19.6294" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.6181 20.875H19.6294" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.9941 17.125H15.0053" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.9941 20.875H15.0053" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.3681 17.125H10.3794" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.3681 20.875H10.3794" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                    
                    Due Date: <span class="text-success-50">{{$task->end_date}}</span>
                </div>
            </div> 
        </div>
        <hr class="border border-black border-1 m-0 shadow-sm">
    </div>

    <div class="container">
        <div class="row">
            @foreach ($notes as $item)
                <div class="col-md-4 p-2 d-flex">
                    <div class="card p-0 shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-1">
                                <input class="form-check-input me-1 border-primary-50" type="checkbox" id="check{{$item->id}}" value="" onchange="complete(check{{$item->id}})">
                                <h3 class="card-title my-1">{{$item->title}}</h3>                 
                            </div>
                            <button class="btn" type="button">
                                <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="5" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> <circle cx="12" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> <circle cx="19" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> </g></svg>
                            </button> 
                        </div>
                        <div class="card-body d-flex flex-fill" style=" height:15em; text-justify: inter-word; text-align: justify"> 
                            {{$item->content}}                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
    </div>
</body>
</html>