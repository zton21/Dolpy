<!DOCTYPE html>
<html>
<head>
    <title>Board Page</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-5">
                <div class="card p-0">
                    <img src="{{URL::asset('img/WebProgrammingWallpaper.png')}}" class="img-fluid card-img-top">
                    <div class="card-body" style="background: #D7E6FD;">
                        <h3>Web Programming</h3>
                        <span>Every Project has it own card too</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-row justify-content-between">
                    <h3>Timeline Dashboard</h3>
                    <button type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                        <span class="text-white my-auto">Add Timeline</span>
                    </button>
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
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header h3">To Do</div>
                    <div class="card-body" id="todo">
                            <div class="card" data-task-id="1">
                                <div class="card-body">
                                    <h5 class="card-title">Task1</h5>
                                    <p class="card-text">Ini description Task 1 </p>
                                    <p class="card-text">Start Date: 22-06-2023</p>
                                    <p class="card-text">Due Date: 04-07-2023</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header h3">In Progress</div>
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
</body>
</html>