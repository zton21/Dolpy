<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ Session::token() }}">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Style --}}
    <link href="{{ asset('css/rfs.css') }}" rel="stylesheet">
    <link href="/css/master.css" rel="stylesheet">
    {{-- Pusher --}}
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        const project_id = {{$project->id}};
        const user_id = {{$user->id}};
        // const data = {{Js::from($messages)}};
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Topic</title>
    <style>
        .card-bg{
            background-image: url('img/WebProgrammingWallpaper.png');
            background-size: cover;
        }
        .active1 .notification {
            display: none !important;
        }
        .active1 {
            background-color: var(--primary-5) !important;
        }

        .notification:empty {
            display: none !important;
        }
        /* width */
        ::-webkit-scrollbar {
        width: 12px;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #D7E6FD;
        border-radius: 20px;
        border: 3px solid #F3F8FE;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #88B3F8; 
        }
        .truncate {
            max-width: 100%;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
        }
    </style>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{asset('js/project.js')}}"></script>
</head>
<body>
    @include('layout.project-nav', ['chatsActive' => "active"])

    <div class="container vh-100" style="padding-top: 90px;">
        <div class="row h-100 border">
            <div class="col-5 p-0 h-100">
                <div class="container-fluid p-0 h-100 d-flex flex-column overflow-hidden">
                    <div class="card p-0">
                        <img src="{{URL::asset('img/WebProgrammingWallpaper.png')}}" class="img-fluid card-img-top">
                        <div class="card-body bg-primary-10">
                            <h3>{{ $project->projectName }}</h3>
                            <div class="truncate" style="max-width: 100%;">{{$project->projectDescription}}</div>
                        </div>
                    </div>
                    <div class="row m-0 py-3 justify-content-between">
                        <div class="col-6">
                            <h3 class="m-0">Topic List</h3>
                        </div>
                        <div class="col-auto com-sm-3">
                            <button onclick="openCreateTopicFormModal()" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                                <span class="text-white my-auto">Create Topic</span>
                            </button>
                            <x-create-topic-form></x-create-topic-form>
                        </div>
                    </div>
                    <div class="container-fluid h-100 mx-auto" style="width: 100%; flex-grow: 1; overflow-x: hidden; overflow-y: auto;">
                        @forelse ($topics as $item)
                        <div class="py-1 my-1 hover-5 {{$item->id == $topic->id?'active1':''}} position-relative dotMenuButtonWrapper" id="t{{$item->id}}">
                            <div class="dropdown position-absolute top-0 end-0">
                                <button class="btn" type="button" id="dotMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="5" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> <circle cx="12" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> <circle cx="19" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> </g></svg>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dotMenuButton">
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#edit-topic-modal" data-topic-id="{{ $item->id }}" data-topic-name="{{ $item->topicName }}" data-topic-description="{{ $item->topicDescription }}">Edit Topic</button>
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#delete-topic-modal" data-topic-id="{{ $item->id }}" data-topic-name="{{ $item->topicName }}">Delete Topic</button>
                                </div>
                            </div>
                            @include('components.edit-topic-form')
                            @include('components.delete-topic-form')
                            <a class="text-decoration-none text-dark" href="?topic={{$loop->index}}">
                                <div class="row d-flex align-items-start px-3 topic">
                                    <div class="col-6">
                                        <h4 class="m-0">{{$item->topicName}}</h4>
                                        <div class="text-secondary">{{$item->topicDate}}</div>
                                    </div>
                                    <div class="col-5 d-flex flex-row gap-2 align-items-center justify-content-end">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                                        <div>by {{$item->firstName}}</div>
                                    </div>
                                </div>
                                <hr class="mt-1 mb-2 mx-3">
                                @isset($item->chatContent)
                                <div class="row d-flex align-items-center justify-content-between px-3 pb-2">
                                    <div class="col-12 d-flex flex-row align-items-center gap-2">
                                        <img src="{{ asset('img/profilePicture.png') }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                                        <div class="me-auto chatcontent">{{$item->chatContent}}</div>
                                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center notification" style="background: #3980F3; width: 32px; height: 32px">{{$item->new_message == 0? '' : $item->new_message}}</div>
                                    </div>
                                </div>
                                @endisset
                                @empty($item->chatContent)
                                <div class="row d-flex align-items-center justify-content-between px-3 pb-2">
                                    <div class="col-12 d-flex flex-row align-items-center gap-2">
                                        <img src="{{ asset('img/profilePicture.png') }}" alt="Profile Picture" class="d-none img-fluid rounded-circle" style="width: 40px">
                                        <div class="me-auto chatcontent">There is no comment yet...</div>
                                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center notification" style="background: #3980F3; width: 32px; height: 32px"></div>
                                    </div>
                                </div>
                                @endempty
                            </a>
                        </div>
                        @empty
                            No topic list, try to create one
                        @endforelse
                    </div>
                </div>
            </div>
            @isset($topic)
            <div class="col-7 h-100 border p-0">
                <div class="container-fluid p-0 h-100 d-flex flex-column">
                    <div class="row p-2 bg-white mx-0">
                        <div class="col-12 d-flex flex-row gap-2">
                            <h1>{{$topic->topicName}}</h1>
                            <div class="mt-2 me-auto" class="text-secondary">{{$topic->topicDate}}</div>
                        </div>
                    </div>
                    <div class="row px-2 mx-0 bg-white pb-3">
                        <div class="me-auto fs-5">{{ $topic->topicDescription }}</div>
                    </div>
                    <hr class="p-0 my-0">
                    <div class="container-fluid p-0 chatbox bg-primary-5" style="flex-grow: 1; overflow-x: hidden; overflow-y: auto;">
                        @forelse ($messages as $item)
                            @if ($item->user_id == $user->id)
                                <div class="row px-4 py-2">
                                    <div class="offset-1 col-10">
                                        <div class="d-flex flex-row-reverse gap-2">
                                            <div>{{$item->firstName}}</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-2 rounded shadow d-inline-flex text-break" style="background: #D7E6FD">
                                                {{$item->chatContent}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                </div>                                
                            @else
                                <div class="row px-4 py-2">
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex flex-row gap-2">
                                            <div>{{$item->firstName}}</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="p-2 bg-white rounded shadow d-inline-block text-break">
                                            {{$item->chatContent}}
                                        </div>
                                    </div>
                                </div>
                                
                            @endif
                        @empty 
                            
                        @endforelse
                    </div>
                    <hr class="p-0 my-0">
                    <div class="row px-2 py-3 mx-0 bg-white pb-3 d-flex">
                        <div class="col-12">
                            <form method="POST" id='chat'>
                                @csrf
                                <div class="d-flex flex-row gap-2 align-items-center">
                                    <input type="hidden" name="topic_id" value="{{$topic->id}}">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0"/></svg>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="py-2 form-control" id="comment" name="comment" placeholder="Type your comment..." aria-describedby="basic-addon1" autocomplete="off" required>
                                    </div>
                                    <label>
                                        <input type="submit" name="message" style="display: none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l-.604-5.437C4.223 5.007 5.825 3.864 7.24 4.535l11.944 5.658c1.525.722 1.525 2.892 0 3.614L7.24 19.465c-1.415.67-3.017-.472-2.844-2.028L5 12Zm0 0h7"/></svg>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
            @empty($topic)
            <div class="col-7 p-0 h-100">
                <div class="container-fluid px-5 h-100 d-flex flex-column align-items-center justify-content-center">
                    <img class="w-25 opacity-25" src="{{ asset('img/logo-primary.png') }}" alt="">
                    <div class="text-neutral-50 fs-5 text-center">Send and receive messages without keeping your phone online. Use Dolpy on up to <span class="text-primary-30">4 linked devices and 1 phone</span> at the same time</div>
                </div>
            </div>
            @endempty
        </div>
    </div>
    <script src="/js/masternav.js"></script>
</body>
</html>