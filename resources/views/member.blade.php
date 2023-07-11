<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
    <style>
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

        /* .myself {
            background-color: #D7E6FD !important;
        } */
        body {
            padding-top: 90px;
        }
    </style>
</head>
<body>
    @include('layout.project-nav', ['peopleActive' => "active"])

    <div class="container vh-100" style="padding-top: 90px;">
        <div class="row h-100 border">
            <div class="col-5 p-0">
                <div class="container-fluid p-0">
                    <div class="card p-0">
                        <img src="{{URL::asset('img/WebProgrammingWallpaper.png')}}" class="img-fluid card-img-top">
                        <div class="card-body" style="background: #D7E6FD;">
                            <h3>{{$project->projectName}}</h3>
                            <span>{{$project->projectDescription}}</span>
                        </div>
                    </div>
                    <div class="row m-0 py-3 justify-content-between">
                        <div class="col-auto">
                            <h3 class="m-0">Members</h3>
                        </div>
                        <div class="col-auto gap-2">
                            @if ($role == 'Creator')
                            <button onclick="openInviteMemberFormModal()" class="btn btn-primary ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                                <span class="text-white py-auto">Invite</span>
                            </button>
                            @endif
                            <x-invite-member-form></x-invite-member-form>
                        </div>
                    </div>
                    <div class="d-flex flex-row rounded-2 my-3" style="background: #F3F8FE">
                        <div class="py-2 px-3 m-0 h4">Project Members ({{$n_members}})</div>
                    </div>
                    @if($n_pending > 0) 
                    <h4 class="px-3">Pending {{$n_pending}}</h4>
                    @endif
                </div>
            </div>
            <div class="col-7 p-0" style="background: #F3F8FE">
                <div class="container-fluid h-100 my-2 p-0">
                    <h2 class="mx-3">Project Members ({{$n_members}})</h2>
                    
                    @if ($role == "Creator")
                    <div class="mx-3 fs-4" style="color: #858487">Project members can view all Project visible boards and create new boards in the Project.</div>
                    @endif
                    <hr class="p-0 my-3 d-block">
                    <div class="container px-4">
                        
                    @if ($role == "Creator")
                        <div class="fs-6" style="color: #858487">Anyone with an invite link can join this Project. You can also disable and create a new invite link for this Project at any time.</div>
                        <div class="d-flex flex-row justify-content-evenly my-3">
                            <button type="button" class="btn btn-sm btn-danger px-4 rounded-3">Disable invite link</button>
                            <button type="button" class="btn btn-sm btn-primary px-4 rounded-3">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.98242 10.9098H7.98589C7.65846 10.9098 7.38694 10.6737 7.38694 10.389C7.38694 10.1042 7.65846 9.86814 7.98589 9.86814H9.98242C12.0748 9.86814 13.7758 8.38897 13.7758 6.56953C13.7758 4.75008 12.0748 3.27091 9.98242 3.27091H5.98937C3.89701 3.27091 2.19596 4.75008 2.19596 6.56953C2.19596 7.33341 2.50742 8.07647 3.06645 8.66675C3.27409 8.88897 3.24214 9.21536 2.98659 9.40286C2.73103 9.58341 2.35569 9.55564 2.14006 9.33341C1.40534 8.55564 0.998047 7.57647 0.998047 6.56953C0.998047 4.17369 3.23416 2.22925 5.98937 2.22925H9.98242C12.7376 2.22925 14.9737 4.17369 14.9737 6.56953C14.9737 8.96536 12.7376 10.9098 9.98242 10.9098Z" fill="white"/><path d="M13.1768 15.7709H9.1837C6.42849 15.7709 4.19238 13.8264 4.19238 11.4306C4.19238 9.03478 6.42849 7.09033 9.1837 7.09033H11.1802C11.5077 7.09033 11.7792 7.32644 11.7792 7.61117C11.7792 7.89589 11.5077 8.132 11.1802 8.132H9.1837C7.09134 8.132 5.3903 9.61117 5.3903 11.4306C5.3903 13.2501 7.09134 14.7292 9.1837 14.7292H13.1768C15.2691 14.7292 16.9702 13.2501 16.9702 11.4306C16.9702 10.6667 16.6587 9.92367 16.0997 9.33339C15.892 9.11117 15.924 8.78478 16.1795 8.59728C16.4351 8.40978 16.8104 8.4445 17.0261 8.66672C17.7688 9.4445 18.1761 10.4237 18.1761 11.4306C18.1681 13.8264 15.932 15.7709 13.1768 15.7709Z" fill="white"/></svg>
                                <span class="text-white py-auto">Invite with link</span>
                            </button>
                        </div>
                        <hr class="p-0 my-3">
                    @endif
                        <div class="border border-2 rounded-pill py-1 px-3 d-inline" style="color: #858487">
                            Sort by Name
                        </div>
                        <hr class="p-0 my-3">
                        <div class="d-flex flex-column my-2 overflow-x-hidden overflow-y-auto" style="height: calc(50vh - 1rem)">
                        @foreach ($members as $item)
                        <div class="row my-2 align-items-center member p-1 {{$item->id == $user->id?'myself':''}}">
                            <div class="col-auto">
                                <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="height: 40px; width: 40px;">
                            </div>
                            <div class="col-8 p-0">
                            <div class="fs-6"><strong>{{$item->firstName}}</strong></div> 
                                <div class="">{{$item->email}}</div>
                            </div>
                            <div class="col-auto ms-auto align-items-center justify-content-center">
                                <div class="row">
                                    @if ($item->role == "Creator")
                                    <div class="col-auto fs-6 p-0 m-0" style="color: #A3A3A5"><strong>CREATOR</strong></div>
                                    @endif
                                    <div class="col-auto">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1253_1400)"><path d="M22.5 10.75C24.2964 10.75 25.75 12.2036 25.75 14C25.75 15.7964 24.2964 17.25 22.5 17.25C20.7036 17.25 19.25 15.7964 19.25 14C19.25 12.2036 20.7036 10.75 22.5 10.75ZM22.5 15.4773C23.3155 15.4773 23.9773 14.8155 23.9773 14C23.9773 13.1845 23.3155 12.5227 22.5 12.5227C21.6845 12.5227 21.0227 13.1845 21.0227 14C21.0227 14.8155 21.6845 15.4773 22.5 15.4773Z" fill="#858487"/><path d="M14 10.75C15.7964 10.75 17.25 12.2036 17.25 14C17.25 15.7964 15.7964 17.25 14 17.25C12.2036 17.25 10.75 15.7964 10.75 14C10.75 12.2036 12.2036 10.75 14 10.75ZM14 15.4773C14.8155 15.4773 15.4773 14.8155 15.4773 14C15.4773 13.1845 14.8155 12.5227 14 12.5227C13.1845 12.5227 12.5227 13.1845 12.5227 14C12.5227 14.8155 13.1845 15.4773 14 15.4773Z" fill="#858487"/><path d="M5.5 10.75C7.29636 10.75 8.75 12.2036 8.75 14C8.75 15.7964 7.29636 17.25 5.5 17.25C3.70364 17.25 2.25 15.7964 2.25 14C2.25 12.2036 3.70364 10.75 5.5 10.75ZM5.5 15.4773C6.31545 15.4773 6.97727 14.8155 6.97727 14C6.97727 13.1845 6.31545 12.5227 5.5 12.5227C4.68455 12.5227 4.02273 13.1845 4.02273 14C4.02273 14.8155 4.68455 15.4773 5.5 15.4773Z" fill="#858487"/></g><defs><clipPath id="clip0_1253_1400"><rect width="28" height="28" fill="white" transform="matrix(-1 0 0 -1 28 28)"/></clipPath></defs></svg>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                        @endforeach
                        
                        {{-- <div class="row my-2 align-items-center">
                            <div class="col-auto">
                                <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="height: 40px; width: 40px;">
                            </div>
                            <div class="col-8 p-0">
                                <div><strong>Erwin Gunawan</strong></div> 
                                <div class="">erwingunawan@gmail.com</div>
                            </div>
                            <div class="col-auto ms-auto">
                                <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.3278 10.5425C24.1011 10.5425 25.5361 11.9444 25.5361 13.6768C25.5361 15.4092 24.1011 16.811 22.3278 16.811C20.5545 16.811 19.1195 15.4092 19.1195 13.6768C19.1195 11.9444 20.5545 10.5425 22.3278 10.5425ZM22.3278 15.1014C23.1328 15.1014 23.7861 14.4632 23.7861 13.6768C23.7861 12.8904 23.1328 12.2521 22.3278 12.2521C21.5228 12.2521 20.8695 12.8904 20.8695 13.6768C20.8695 14.4632 21.5228 15.1014 22.3278 15.1014Z" fill="#858487"/><path d="M5.99479 10.5425C7.76813 10.5425 9.20313 11.9444 9.20312 13.6768C9.20312 15.4092 7.76813 16.811 5.99479 16.811C4.22146 16.811 2.78646 15.4092 2.78646 13.6768C2.78646 11.9444 4.22146 10.5425 5.99479 10.5425ZM5.99479 15.1014C6.79979 15.1014 7.45313 14.4632 7.45313 13.6768C7.45313 12.8904 6.79979 12.2521 5.99479 12.2521C5.18979 12.2521 4.53646 12.8904 4.53646 13.6768C4.53646 14.4632 5.18979 15.1014 5.99479 15.1014Z" fill="#858487"/><path d="M14.1608 10.5427C15.9341 10.5427 17.3691 11.9445 17.3691 13.6769C17.3691 15.4093 15.9341 16.8112 14.1608 16.8112C12.3875 16.8112 10.9525 15.4093 10.9525 13.6769C10.9525 11.9445 12.3875 10.5427 14.1608 10.5427ZM14.1608 15.1016C14.9658 15.1016 15.6191 14.4633 15.6191 13.6769C15.6191 12.8905 14.9658 12.2522 14.1608 12.2522C13.3558 12.2522 12.7025 12.8905 12.7025 13.6769C12.7025 14.4633 13.3558 15.1016 14.1608 15.1016Z" fill="#858487"/></svg>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>