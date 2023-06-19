<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{URL::asset('css/rfs.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="px-5 text-center">
                    <img src="{{URL::asset('img/logo-primary.png')}}" alt="Logo" class="img mh-25 mw-25" >
                    <span class="h3 fw-bold mb-0">Dolpy</span>
                </div>
                <div class="text-center h3 mt-2 mb-3">Reset Password</div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <label for="" class="form-label">Create New Password</label>
                                    <input type="password" class="form-control" id="NewPassword" placeholder="New Password">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password">
                                </div>
                                <div id="errorMsgPassword" class="row card-text border rounded-2 m-0 my-2" style="opacity: 0%">
                                    <div class="col-2 my-auto">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.9999 2.66671C8.66658 2.66671 2.66658 8.66671 2.66658 16C2.66658 23.3334 8.66658 29.3334 15.9999 29.3334C23.3333 29.3334 29.3333 23.3334 29.3333 16C29.3333 8.66671 23.3333 2.66671 15.9999 2.66671Z" stroke="#DD2525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16 21.3334V14.6667" stroke="#DD2525" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.0073 10.6666H15.9953" stroke="#DD2525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>    
                                    </div>
                                    <div class="col-10 text-danger my-auto ps-0" style="font-size: calc(0.7rem + 0.2vw);">
                                        Your new password cannot be the same as your current password.
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-block mt-1">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>