<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{URL::asset('css/rfs.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{URL::asset('css/index.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/index.js')}}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .info-card{
            background: #D7E6FD;
            border: 1px solid #88B3F8;
            border-radius: 10px;
        }
        .profile-card{
            border: 1px solid #A3A3A5;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top w-100" style="border-bottom: 1px solid black;">
        <div class="container"><div class="row w-100 justify-content-between">
            {{-- Dolpy brand --}}
            <div class="col-md-2 col-sm-6 navbar-brand d-flex flex-row">
                <div style="width:2.5em; max-width:10vh;">
                    <img src="{{URL::asset('img/logo_blue.png')}}" alt="Logo" class="img-fluid">
                </div>
                <div class="text-primary-50 fw-bold fs-3 ms-2" style="color: #3980F3" href="/index">Dolpy</div>
            </div>
            {{-- Notif --}}
            <div class="col-md-auto">
                <div class="row justify-content-end">
                    <div class="col-md-auto position-relative p-0 my-auto mx-3">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5224 23.0963C10.9011 23.0963 8.27985 22.68 5.7936 21.8475C4.8486 21.5213 4.1286 20.8575 3.8136 19.9913C3.48735 19.125 3.59985 18.1688 4.11735 17.3138L5.4111 15.165C5.6811 14.715 5.9286 13.815 5.9286 13.2863V10.035C5.9286 5.85003 9.33735 2.44128 13.5224 2.44128C17.7074 2.44128 21.1161 5.85003 21.1161 10.035V13.2863C21.1161 13.8038 21.3636 14.715 21.6336 15.1763L22.9161 17.3138C23.3999 18.1238 23.4899 19.1025 23.1636 19.9913C22.8374 20.88 22.1286 21.555 21.2399 21.8475C18.7649 22.68 16.1436 23.0963 13.5224 23.0963ZM13.5224 4.12878C10.2711 4.12878 7.6161 6.77253 7.6161 10.035V13.2863C7.6161 14.1075 7.2786 15.3225 6.86235 16.0313L5.5686 18.18C5.3211 18.5963 5.2536 19.035 5.39985 19.4063C5.53485 19.7888 5.87235 20.0813 6.3336 20.2388C11.0361 21.8138 16.0199 21.8138 20.7224 20.2388C21.1274 20.1038 21.4424 19.8 21.5886 19.395C21.7349 18.99 21.7011 18.5513 21.4761 18.18L20.1824 16.0313C19.7549 15.3 19.4286 14.0963 19.4286 13.275V10.035C19.4286 6.77253 16.7849 4.12878 13.5224 4.12878Z" fill="#1D1D1D"/>
                            <path d="M15.6152 4.43251C15.5364 4.43251 15.4577 4.42126 15.3789 4.39876C15.0527 4.30876 14.7377 4.24126 14.4339 4.19626C13.4777 4.07251 12.5552 4.14001 11.6889 4.39876C11.3739 4.50001 11.0364 4.39876 10.8227 4.16251C10.6089 3.92626 10.5414 3.58876 10.6652 3.28501C11.1264 2.10376 12.2514 1.32751 13.5339 1.32751C14.8164 1.32751 15.9414 2.09251 16.4027 3.28501C16.5152 3.58876 16.4589 3.92626 16.2452 4.16251C16.0764 4.34251 15.8402 4.43251 15.6152 4.43251Z" fill="#1D1D1D"/>
                            <path d="M13.5225 25.6613C12.4087 25.6613 11.3287 25.2113 10.5412 24.4238C9.75371 23.6363 9.30371 22.5563 9.30371 21.4425H10.9912C10.9912 22.1063 11.2612 22.7588 11.7337 23.2313C12.2062 23.7038 12.8587 23.9738 13.5225 23.9738C14.9175 23.9738 16.0537 22.8375 16.0537 21.4425H17.7412C17.7412 23.7713 15.8512 25.6613 13.5225 25.6613Z" fill="#1D1D1D"/>
                        </svg>                        
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">1</span>
                    </div>
                    <div class="col-md-5">
                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                    </div>
                </div>
            </div>
        </div></div>
    </nav>

    {{-- {{ $user->name }} --}}

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="row align-items-center justify-content-center my-4">
                    <div class="col-md-2">
                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-5 py-auto">
                        <h4 class="m-0">Brigita Vanessa</h4>
                        <p class="m-0">@brigitavanessa99</p>
                    </div>
                </div>
                <div style="width: 1px; background-color:black"></div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-6"  style="border-top: 1px solid black">
                <div class="h3 text-center my-4">
                    Manage your personal <span class="text-primary-70">information</span>
                </div> 
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 info-card">
                <div class="row align-items-center justify-content-center my-3 ">
                    <div class="col-md-auto">
                        <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 3.41665C9.47921 3.41665 2.91671 9.97915 2.91671 18C2.91671 26.0208 9.47921 32.5833 17.5 32.5833C25.5209 32.5833 32.0834 26.0208 32.0834 18C32.0834 9.97915 25.5209 3.41665 17.5 3.41665Z" stroke="#3980F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.5 23.8333V16.5416" stroke="#3980F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.5081 12.1667H17.495" stroke="#3980F3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>    
                    </div>
                    <div class="col-md-10 fs-5">
                        Manage your info, contact, dan password to make <span class="text-primary-70 fw-bold">Dolpy</span> work better for you.</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-3">
            <div class="col-md-5 profile-card mx-2 p-3">
                <div class="fs-3">
                    Basic Info
                </div> 
                <div class="row my-3">
                    <div class="col-md-3" style="color: #858487">
                        Name
                    </div>
                    <div class="col-md-8">
                        {{ $user->firstName }} {{ $user->lastName}}
                    </div>
                    <a class="col-md-1" href="#">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </a>
                </div>
                <div class="row pt-3 border-top" style="border-top: 1px solid #A3A3A5!important;">
                    <div class="col-md-3" style="color: #858487">
                        Birthday
                    </div>
                    <div class="col-md-8">
                        @if($user->birthday == NULL){
                            Set your birthday
                        }
                        @else{
                            {{ $user->birthday }}
                        }
                        @endif
                    </div>
                    <a class="col-md-1" href="#">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-3">
            <div class="col-md-5 profile-card mx-2 p-3">
                <div class="fs-3">
                    Contact Info
                </div> 
                <div class="row my-3">
                    <div class="col-md-3" style="color: #858487">
                        Email
                    </div>
                    <div class="col-md-8">
                        {{ $user->email }}
                    </div>
                    <a class="col-md-1" href="#">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </a>
                </div>
                <div class="row pt-3 border-top">
                    <div class="col-md-3" style="color: #858487">
                        Phone
                    </div>
                    <div class="col-md-8">
                        {{ $user->phone }}
                    </div>
                    <a class="col-md-1" href="#">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-3">
            <div class="col-md-5 profile-card mx-2 p-3">
                <div class="fs-3">
                    Password
                </div> 
                A secure password helps protect your account
                
                <div class="row pt-3 justify-content-between">
                    <div class="col-md-8" style="color: #858487">
                        ************ {{-- {{ $user->password }} --}}
                    </div>
                    <a class="col-md-1" href="#">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </a>
                </div>
                Last changed Jan 18
            </div>
        </div>
        
    </div>
</body>
</html>