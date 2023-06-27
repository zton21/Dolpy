<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Topic</title>
    <style>
        .card-bg{
            background-image: url('img/WebProgrammingWallpaper.png');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container p-0">
        <div class="row">
            <div class="col-5" style="border: 1px solid #A3A3A5;">
                <div class="container-fluid p-0">
                    <div class="row card-bg p-1 align-items-end" style="height: 96px">
                        <div class="col-6"></div>
                        <div class="col-6 d-flex justify-content-end">
                            <a class="btn btn-primary d-inline-flex flex-row gap-2 align-items-center" style="background: #3980F3; font-size: 14px" href="#" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1l1-4l9.5-9.5z"/></g></svg>
                                <div class="text-white">Modify Theme</div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div style="background: #D7E6FD" class="rounded-bottom px-3 py-4">
                            <h3>{{$project->projectName}}</h3>
                            <span>{{$project->projectDescription}}</span>
                        </div>
                    </div>
                    <div class="row py-2 align-items-center">
                        <div class="col-6">
                            <h1>Topic List</h1>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a class="btn px-4 btn-primary d-inline-flex flex-row gap-2 align-items-center" style="background: #3980F3" href="#" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                                <div class="text-white">Add Topic</div>
                            </a>
                        </div>
                    </div>
                    @forelse ($topics as $item)
                        <div class="row d-flex align-items-start px-3">
                            <div class="col-6">
                                <h4 class="m-0">{{$item->topicName}}</h4>
                                <div class="text-secondary">{{$item->topicDate}}</div>
                            </div>
                            <div class="col-6 d-flex flex-row gap-2 align-items-center justify-content-end">
                                <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                                <div>by {{$item->firstName}}</div>
                            </div>
                        </div>
                        <hr class="mt-1 mb-2 mx-3">
                        @isset($item->chatContent)
                        <div class="row d-flex align-items-center justify-content-between px-3 pb-2">
                            <div class="col-12 d-flex flex-row align-items-center gap-2">
                                <img src="{{ asset('img/profilePicture.png') }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                                <div class="me-auto">{{$item->chatContent}}</div>
                                <div class="rounded-circle text-white d-flex align-items-center justify-content-center" style="background: #3980F3; width: 32px; height: 32px">5+</div>
                            </div>
                        </div>
                        @endisset
                        @empty($record)
                        <div class="row d-flex align-items-center justify-content-between px-3 pb-2">
                            <div class="col-12 d-flex flex-row align-items-center gap-2">
                                <div class="me-auto">No Comment...</div>
                            </div>
                        </div>
                        @endempty
                    @empty
                        No topic list, try to create one
                    @endforelse
                </div>
            </div>
            <div class="col-7 p-0" style="border: 1px solid #A3A3A5;">
                <div class="container-fluid p-0" style="background: #F3F8FE">
                    <div class="row p-2 bg-white mx-0">
                        <div class="col-12 d-flex flex-row gap-2">
                            <h1>Design System</h1>
                            <div class="mt-2 me-auto" class="text-secondary">10/2/2023 - 02.36 PM</div>
                            <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path fill="black" d="M128 96a32 32 0 1 0 32 32a32 32 0 0 0-32-32Zm0 48a16 16 0 1 1 16-16a16 16 0 0 1-16 16ZM48 96a32 32 0 1 0 32 32a32 32 0 0 0-32-32Zm0 48a16 16 0 1 1 16-16a16 16 0 0 1-16 16Zm160-48a32 32 0 1 0 32 32a32 32 0 0 0-32-32Zm0 48a16 16 0 1 1 16-16a16 16 0 0 1-16 16Z"/></svg>
                        </div>
                    </div>
                    <div class="row px-2 mx-0 bg-white pb-3">
                        <div class="col-12 d-flex flex-row gap-2 align-items-center">
                            <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                            <div class="me-auto fs-5">doloremque dolor est quia delectus non galisum culpa?</div>
                        </div>
                    </div>
                    <hr class="p-0 my-0">
                    <div class="container-fluid p-0">
                        <div class="row px-4 py-2">
                            <div class="col-1">
                                <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-11">
                                <div class="d-flex flex-row gap-2">
                                    <div>Gundul Pacul</div>
                                    <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                </div>
                                <div class="p-2 bg-white rounded shadow d-inline-block text-break">
                                    whatsup dude
                                </div>
                            </div>
                        </div>
                        <div class="row px-4 py-2">
                            <div class="col-1">
                                <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-11">
                                <div class="d-flex flex-row gap-2">
                                    <div>Gundul Pacul</div>
                                    <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                </div>
                                <div class="p-2 bg-white rounded shadow d-inline-block text-break">
                                    whatsup dude
                                </div>
                            </div>
                        </div>
                        <div class="row px-4 py-2">
                            <div class="col-11">
                                <div class="d-flex flex-row-reverse gap-2">
                                    <div>Pacul Tembak</div>
                                    <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2 rounded shadow d-inline-flex text-break" style="background: #D7E6FD">
                                        whatsup dude
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                            </div>
                        </div>
                    </div>
                    <hr class="p-0 my-0">
                    <div class="row px-2 py-3 mx-0 bg-white pb-3 d-flex">
                        <div class="col-12">
                            <div class="d-flex flex-row gap-2 align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0"/></svg>
                                <div class="input-group">
                                    <input type="text" class="py-2 form-control" placeholder="Type your comment..." aria-describedby="basic-addon1">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l-.604-5.437C4.223 5.007 5.825 3.864 7.24 4.535l11.944 5.658c1.525.722 1.525 2.892 0 3.614L7.24 19.465c-1.415.67-3.017-.472-2.844-2.028L5 12Zm0 0h7"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>