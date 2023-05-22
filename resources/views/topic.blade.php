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
        <div class="row border border-dark">
            <div class="col-5">
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
                            <h3>Web Programming</h3>
                            <span>Every Project has it own card too</span>
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
                    <div class="row d-flex align-items-start">
                        <div class="col-6">
                            <h4 class="m-0">Brainstorming</h4>
                            <div class="text-secondary">10/1/2023 - 02.39 PM</div>
                        </div>
                        <div class="col-6 d-flex flex-row gap-2 align-items-center justify-content-end">
                            <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                            <div>by Gundul Pacul</div>
                        </div>
                    </div>
                    <hr class="mt-1 mb-2">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-12 d-flex flex-row align-items-center gap-2">
                            <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px">
                            <div class="me-auto">I think a group work application is a good idea ...</div>
                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center" style="background: #3980F3; width: 32px; height: 32px">5+</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="container-fluid">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>