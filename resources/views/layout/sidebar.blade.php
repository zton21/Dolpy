<nav class="sidebar close">
    <div class="sidebar_body d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <ul class="nav flex-column mx-n1">
            <li class="">
                <a href="#" class="nav-link sdinactive" aria-current="HOME">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 21V17.5" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.7483 3.29L3.66332 9.765C2.75332 10.4883 2.16998 12.0167 2.36832 13.16L3.91998 22.4467C4.19998 24.1033 5.78665 25.445 7.46665 25.445H20.5333C22.2017 25.445 23.8 24.0917 24.08 22.4467L25.6317 13.16C25.8183 12.0167 25.235 10.4883 24.3367 9.765L16.2517 3.30166C15.0033 2.29833 12.985 2.29833 11.7483 3.29Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link sdinactive"  aria-current="Calendar">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2.5V6.25" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 2.5V6.25" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.375 11.3625H25.625" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26.25 10.625V21.25C26.25 25 24.375 27.5 20 27.5H10C5.625 27.5 3.75 25 3.75 21.25V10.625C3.75 6.875 5.625 4.375 10 4.375H20C24.375 4.375 26.25 6.875 26.25 10.625Z" stroke="#1D1D1D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.6181 17.125H19.6294" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.6181 20.875H19.6294" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.9941 17.125H15.0053" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.9941 20.875H15.0053" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.3681 17.125H10.3794" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.3681 20.875H10.3794" stroke="#1D1D1D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>      
                    Calendar
                </a>
            </li>
        </ul>
        <hr>
        <div class="px-1 mb-2">
            Jump to other project
        </div>
        <ul class="nav flex-column mx-n1">
            <li class="list-item">
                <a href="#" class="nav-link sdinactive">
                    <img id="profileImageNav" src="{{ asset('storage/' . $user->profileURL) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
                    Project 1
                </a>
            </li>
            <li class="list-item">
                <a href="#" class="nav-link sdinactive">
                    <img id="profileImageNav" src="{{ asset('storage/' . $user->profileURL) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
                    Project 2
                </a>
            </li>
        </ul>
    </div>
</nav>
