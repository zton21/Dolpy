<nav class="navbar navbar-expand-sm navbar-light bg-white navbar-custom mb-2">
    <div class="container-fluid px-5">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('/img/logo-primary.png') }}" alt="Logo" height="40px">
            <div class="text-primary-50 fw-bold fs-4 ms-2">Dolpy</div>
        </a>
        <div class="d-flex flex-row">
            <form class="d-flex m-0">
                <input class="form-control me-2 my-2 d-none d-md-block" type="search" placeholder="Search" aria-label="Search">
            </form>
            <ul class="navbar-nav align-items-center gap-2">
                <li class="nav-item" style="border-radius: 50%;">
                    <a class="nav-link" href="{{ route('faq') }}">
                        <svg class="" swidth="30px" height="30px" viewBox="0 0 24.00 24.00" fill="#1D1D1D" xmlns="http://www.w3.org/2000/svg" id="SVGRepo_faq" ><g stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 19.5C16.1421 19.5 19.5 16.1421 19.5 12C19.5 7.85786 16.1421 4.5 12 4.5C7.85786 4.5 4.5 7.85786 4.5 12C4.5 16.1421 7.85786 19.5 12 19.5ZM12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM12.75 15V16.5H11.25V15H12.75ZM10.5 10.4318C10.5 9.66263 11.1497 9 12 9C12.8503 9 13.5 9.66263 13.5 10.4318C13.5 10.739 13.3151 11.1031 12.9076 11.5159C12.5126 11.9161 12.0104 12.2593 11.5928 12.5292L11.25 12.7509V14.25H12.75V13.5623C13.1312 13.303 13.5828 12.9671 13.9752 12.5696C14.4818 12.0564 15 11.3296 15 10.4318C15 8.79103 13.6349 7.5 12 7.5C10.3651 7.5 9 8.79103 9 10.4318H10.5Z" fill="inherit"></path> </g></svg>
                    </a>
                </li>
                <li class="nav-item dropdown notif">
                    <a class="nav-link" href="#" role="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="26px" height="26px" viewBox="0 0 24 24" fill="none" stroke="#1D1D1D" xmlns="http://www.w3.org/2000/svg" id="SVGRepo_notif"><g stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                            <path d="M12.02 2.90991C8.70997 2.90991 6.01997 5.59991 6.01997 8.90991V11.7999C6.01997 12.4099 5.75997 13.3399 5.44997 13.8599L4.29997 15.7699C3.58997 16.9499 4.07997 18.2599 5.37997 18.6999C9.68997 20.1399 14.34 20.1399 18.65 18.6999C19.86 18.2999 20.39 16.8699 19.73 15.7699L18.58 13.8599C18.28 13.3399 18.02 12.4099 18.02 11.7999V8.90991C18.02 5.60991 15.32 2.90991 12.02 2.90991Z" stroke="inherit" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                            <path d="M13.87 3.19994C13.56 3.10994 13.24 3.03994 12.91 2.99994C11.95 2.87994 11.03 2.94994 10.17 3.19994C10.46 2.45994 11.18 1.93994 12.02 1.93994C12.86 1.93994 13.58 2.45994 13.87 3.19994Z" stroke="inherit" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.02 19.0601C15.02 20.7101 13.67 22.0601 12.02 22.0601C11.2 22.0601 10.44 21.7201 9.90002 21.1801C9.36002 20.6401 9.02002 19.8801 9.02002 19.0601" stroke="inherit" stroke-width="1.5" stroke-miterlimit="10"></path> </g></svg>
                    </a>
                    <div class="bg-primary-5 dropdown-menu dropdown-menu-end dropdown-menu-lg" aria-labelledby="notificationDropdown">
                        <div class="fs-4 px-3 pt-2 fw-semibold">Notification</div>
                        <hr class="mx-3 mb-0">
                        @foreach ($notifs as $item)
                        <form class="d-flex flex-row p-3 gap-3 w-100 flex-shrink-1 accept-invite disabled text-dark" method="POST" action='/home'>
                            @csrf
                            <input type='hidden' name='notif_id' value='{{$item->id}}'>
                            <img class="img-fluid rounded-circle fs-5" style="width: 2em;" src="{{ asset('img/profilePicture.png') }}" alt="">
                            <div class="d-flex flex-column">
                                <div class="d-flex"><b>{{$item->firstName}} {{$item->lastName}}</b>&nbsp;has invited you to&nbsp;<b>{{$item->projectName}}</b></div>
                                <div>{{date('d/m/Y - g:i A', strtotime($item->created_at))}}</div>
                                <div class="d-flex flex-row gap-2">
                                    <button name="task" value="accept_invite" class="btn btn-primary">Accept</button>
                                    <button name="task" value="reject_invite" class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        </form>                            
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img id="profileImageNav" src="{{ asset('storage/' . $user->profileURL) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">Manage Account</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
  </nav>