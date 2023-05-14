<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .navbar {

        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top w-100">
        <div class="container"><div class="row w-100">
            {{-- Dolpy brand --}}
            <div class="col-md-2 col-sm-6 navbar-brand d-flex flex-row">
                <div style="width:2.5em; max-width:10vh;">
                    <img src="{{URL::asset('img/logo.png')}}" alt="Logo" class="img-fluid">
                </div>
                <div class="text-neutral-10 fw-bold fs-3 ms-2" href="/index">Dolpy</div>
            </div>
            
        </div></div>
    </nav>

    <div class="container-fluid mx-sm-4 mx-1">
        <div class="row fs-1">
            <div class="text-primary">Good Morning {{$user->name}}</div>, ready to work?
        </div>
        <div class="row projects">
            <div class="row">
                <div class="col-4">
                    <div class="h4">XX</div>
                    <div class="h4">Project</div>
                </div>
                <div class="col-8 ">
                    {{-- Sort By --}}
                    {{-- Button: Create Project --}}
                </div>
            </div>
            <div class="row">
                <div class="col-4">Project Name</div>
                <div class="col-2">Status</div>
                <div class="col-2">Owner</div>
                <div class="col-2">Due Date</div>
                <div class="col-2">Progress</div>
            </div>

            @foreach ($projects as $item)
                <div class="row">
                    <div class="col-4">Project Name</div>
                    <div class="col-2">Status</div>
                    <div class="col-2">Owner</div>
                    <div class="col-2">Due Date</div>
                    <div class="col-2">Progress</div>
                </div>                
            @endforeach
        </div>
    </div>
</body>
</html>