<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/master.css" rel="stylesheet" >
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
        /* body {
            padding-top: 90px;
        } */
    </style>
</head>
<body>
    @include('layout.project-nav', ['peopleActive' => "active"])

    <div class="container vh-100" style="padding-top: 90px;">
        <div class="row h-100 border">
            <div class="col-5 p-0 h-100">
                <div class="container-fluid p-0 h-100">
                    <div class="card p-0">
                        <img style="height: 4em" src="{{ asset($project->projectWallpaperURL) }}" class="img-fluid card-img-top">
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
                            <button onclick="openInviteMemberFormModal()" class="btn bg-primary-50 ms-auto btndolpy d-flex align-items-center justify-content-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                                <span class="text-white py-auto">Invite Member</span>
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
            <div class="col-7 p-0 h-100" style="background: #F3F8FE">
                <div class="d-flex flex-column h-100 py-2 p-0">
                    <h2 class="mx-3">Project Members ({{$n_members}})</h2>
                    
                    @if ($role == "Creator")
                    <div class="mx-3 fs-6" style="color: #858487">Project members can view all Project visible boards and create new boards in the Project.</div>
                    @endif
                    <hr class="p-0 my-3 d-block">
                    {{-- @if ($role == "Creator")
                        <div class="fs-6 mx-3" style="color: #858487">Anyone with an invite link can join this Project. You can also disable and create a new invite link for this Project at any time.</div>
                        <div class="d-flex flex-row justify-content-evenly">
                            <button type="button" class="btn btn-sm btn-danger px-4 rounded-3">Disable invite link</button>
                            <button type="button" class="btn btn-sm btn-primary px-4 rounded-3">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.98242 10.9098H7.98589C7.65846 10.9098 7.38694 10.6737 7.38694 10.389C7.38694 10.1042 7.65846 9.86814 7.98589 9.86814H9.98242C12.0748 9.86814 13.7758 8.38897 13.7758 6.56953C13.7758 4.75008 12.0748 3.27091 9.98242 3.27091H5.98937C3.89701 3.27091 2.19596 4.75008 2.19596 6.56953C2.19596 7.33341 2.50742 8.07647 3.06645 8.66675C3.27409 8.88897 3.24214 9.21536 2.98659 9.40286C2.73103 9.58341 2.35569 9.55564 2.14006 9.33341C1.40534 8.55564 0.998047 7.57647 0.998047 6.56953C0.998047 4.17369 3.23416 2.22925 5.98937 2.22925H9.98242C12.7376 2.22925 14.9737 4.17369 14.9737 6.56953C14.9737 8.96536 12.7376 10.9098 9.98242 10.9098Z" fill="white"/><path d="M13.1768 15.7709H9.1837C6.42849 15.7709 4.19238 13.8264 4.19238 11.4306C4.19238 9.03478 6.42849 7.09033 9.1837 7.09033H11.1802C11.5077 7.09033 11.7792 7.32644 11.7792 7.61117C11.7792 7.89589 11.5077 8.132 11.1802 8.132H9.1837C7.09134 8.132 5.3903 9.61117 5.3903 11.4306C5.3903 13.2501 7.09134 14.7292 9.1837 14.7292H13.1768C15.2691 14.7292 16.9702 13.2501 16.9702 11.4306C16.9702 10.6667 16.6587 9.92367 16.0997 9.33339C15.892 9.11117 15.924 8.78478 16.1795 8.59728C16.4351 8.40978 16.8104 8.4445 17.0261 8.66672C17.7688 9.4445 18.1761 10.4237 18.1761 11.4306C18.1681 13.8264 15.932 15.7709 13.1768 15.7709Z" fill="white"/></svg>
                                <span class="text-white py-auto">Invite with link</span>
                            </button>
                        </div>
                        <hr class="p-0 my-3">
                    @endif --}}
                        <div class="container-fluid d-flex flex-column overflow-x-hidden overflow-y-auto h-100">
                        @foreach ($members as $item)
                        <div class="row py-2 align-items-center member p-1">
                            <div class="col-auto">
                                <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="height: 40px; width: 40px;">
                            </div>
                            <div class="col-8 p-0">
                            <div class="fs-6 {{$item->id == $user->id?'text-primary':''}}"><strong>{{$item->firstName}} {{$item->lastName}}</strong></div> 
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
                </div>
            </div>
        </div>
    </div>
    <script src="/js/masternav.js"></script>
</body>
</html>