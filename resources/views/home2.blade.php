@extends('layout.master')
@section('title', 'Home | Dolpy')

@section('content')
<style>
    .truncate {
        max-width: 100%;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
    }
</style>
<div class="container">
    <div class="row fs-2 w-100 mx-auto">
        <div class="col-12 d-flex flex-row fw-semibold mt-2 mx-0 px-0">
            <div class="text-primary-50"> ({{sizeof($projects)}}) Search Result:</div>
        </div>
    </div>
    <div class="row projects mx-auto px-0">
        <div class="col-12 mx-0 px-0 d-flex align-items-center my-3">
            <div class="h2 h-100 d-flex gap-2 align-items-center me-auto">
                <svg width="32" height="32" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.0086 34.4742C26.5645 34.4742 26.1032 34.4571 25.6078 34.4058C24.7195 34.3375 23.7115 34.1667 22.6695 33.9104L19.7995 33.2271C11.924 31.365 9.34446 27.1967 11.1895 19.3383L12.8636 12.1804C13.2395 10.5575 13.6836 9.24209 14.2303 8.14876C17.1686 2.08417 22.789 2.63084 26.7865 3.57042L29.6395 4.23667C33.637 5.17626 36.1653 6.66251 37.5832 8.93459C38.984 11.2067 39.2061 14.1279 38.2665 18.1254L36.5924 25.2663C35.1232 31.5188 32.0653 34.4742 27.0086 34.4742ZM22.4132 5.55209C19.5603 5.55209 17.7495 6.73084 16.5365 9.25917C16.0924 10.1817 15.6995 11.3263 15.3578 12.7613L13.6836 19.9192C12.1632 26.3767 13.9228 29.1954 20.3803 30.7329L23.2503 31.4163C24.1728 31.6383 25.044 31.775 25.8299 31.8433C30.4765 32.3046 32.7828 30.2717 34.0811 24.6854L35.7553 17.5446C36.524 14.2475 36.4215 11.9413 35.3965 10.2842C34.3715 8.62709 32.3557 7.49959 29.0415 6.73084L26.1886 6.06459C24.7707 5.72292 23.5065 5.55209 22.4132 5.55209Z" fill="#1D1D1D"/>
                    <path d="M14.2305 38.0104C9.84005 38.0104 7.03838 35.3795 5.24463 29.8274L3.05796 23.0795C0.632131 15.5629 2.80171 11.3262 10.2842 8.90037L12.9834 8.02912C13.8717 7.75578 14.538 7.56787 15.1359 7.46537C15.6313 7.36287 16.1096 7.55078 16.4 7.9437C16.6905 8.33662 16.7417 8.84912 16.5367 9.29328C16.0925 10.1987 15.6996 11.3433 15.375 12.7783L13.7009 19.9362C12.1805 26.3937 13.94 29.2125 20.3975 30.75L23.2675 31.4333C24.19 31.6554 25.0613 31.792 25.8471 31.8604C26.3938 31.9116 26.838 32.2874 26.9917 32.817C27.1284 33.3466 26.9234 33.8933 26.4792 34.2008C25.3517 34.9695 23.9338 35.6187 22.14 36.1995L19.4409 37.0879C17.4763 37.7029 15.768 38.0104 14.2305 38.0104ZM13.2909 10.6258L11.0871 11.3433C4.98838 13.3079 3.5363 16.1779 5.50088 22.2937L7.68755 29.0416C9.66921 35.1404 12.5392 36.6095 18.638 34.645L21.3371 33.7566C21.4396 33.7225 21.525 33.6883 21.6275 33.6541L19.8167 33.227C11.9413 31.365 9.36171 27.1966 11.2067 19.3383L12.8809 12.1804C13.0005 11.6337 13.1371 11.1041 13.2909 10.6258Z" fill="#1D1D1D"/>
                    <path d="M29.8788 17.9546C29.7763 17.9546 29.6738 17.9375 29.5543 17.9204L21.2688 15.8192C20.5855 15.6483 20.1755 14.9479 20.3463 14.2646C20.5172 13.5812 21.2176 13.1712 21.9009 13.3421L30.1863 15.4433C30.8697 15.6142 31.2797 16.3146 31.1088 16.9979C30.9722 17.5617 30.4426 17.9546 29.8788 17.9546Z" fill="#1D1D1D"/>
                    <path d="M24.8733 23.7287C24.7708 23.7287 24.6683 23.7116 24.5487 23.6945L19.5774 22.4304C18.8941 22.2595 18.4841 21.5591 18.6549 20.8758C18.8258 20.1924 19.5262 19.7824 20.2095 19.9533L25.1808 21.2174C25.8641 21.3883 26.2741 22.0887 26.1033 22.772C25.9666 23.3529 25.4541 23.7287 24.8733 23.7287Z" fill="#1D1D1D"/>
                </svg> 
                Project
            </div>
        </div>
    </div>
    <div class="row w-100 text-neutral-50 bg-primary-10 py-1 table-header mx-auto">
        <div class="col-4 text-center">
            <svg class="me-2" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 23.3438H8C4.35 23.3438 2.25 21.2437 2.25 17.5938V7.59375C2.25 3.94375 4.35 1.84375 8 1.84375H16C19.65 1.84375 21.75 3.94375 21.75 7.59375V17.5938C21.75 21.2437 19.65 23.3438 16 23.3438ZM8 3.34375C5.14 3.34375 3.75 4.73375 3.75 7.59375V17.5938C3.75 20.4538 5.14 21.8438 8 21.8438H16C18.86 21.8438 20.25 20.4538 20.25 17.5938V7.59375C20.25 4.73375 18.86 3.34375 16 3.34375H8Z" fill="#858487"/>
                <path d="M18.5 9.84375H16.5C14.98 9.84375 13.75 8.61375 13.75 7.09375V5.09375C13.75 4.68375 14.09 4.34375 14.5 4.34375C14.91 4.34375 15.25 4.68375 15.25 5.09375V7.09375C15.25 7.78375 15.81 8.34375 16.5 8.34375H18.5C18.91 8.34375 19.25 8.68375 19.25 9.09375C19.25 9.50375 18.91 9.84375 18.5 9.84375Z" fill="#858487"/>
                <path d="M9.99994 18.3437C9.80994 18.3437 9.61994 18.2738 9.46994 18.1238L7.46994 16.1237C7.17994 15.8338 7.17994 15.3537 7.46994 15.0637L9.46994 13.0637C9.75994 12.7737 10.2399 12.7737 10.5299 13.0637C10.8199 13.3537 10.8199 13.8338 10.5299 14.1237L9.05994 15.5937L10.5299 17.0637C10.8199 17.3537 10.8199 17.8338 10.5299 18.1238C10.3799 18.2738 10.1899 18.3437 9.99994 18.3437Z" fill="#858487"/>
                <path d="M13.9999 18.3437C13.8099 18.3437 13.6199 18.2738 13.4699 18.1238C13.1799 17.8338 13.1799 17.3537 13.4699 17.0637L14.9399 15.5937L13.4699 14.1237C13.1799 13.8338 13.1799 13.3537 13.4699 13.0637C13.7599 12.7737 14.2399 12.7737 14.5299 13.0637L16.5299 15.0637C16.8199 15.3537 16.8199 15.8338 16.5299 16.1237L14.5299 18.1238C14.3799 18.2738 14.1899 18.3437 13.9999 18.3437Z" fill="#858487"/>
            </svg>
            Project Name
        </div>
        <div class="col-3 text-center">
            <svg class="me-2" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.15957 12.12C9.12957 12.12 9.10957 12.12 9.07957 12.12C9.02957 12.11 8.95957 12.11 8.89957 12.12C5.99957 12.03 3.80957 9.75 3.80957 6.94C3.80957 4.08 6.13957 1.75 8.99957 1.75C11.8596 1.75 14.1896 4.08 14.1896 6.94C14.1796 9.75 11.9796 12.03 9.18957 12.12C9.17957 12.12 9.16957 12.12 9.15957 12.12ZM8.99957 3.25C6.96957 3.25 5.30957 4.91 5.30957 6.94C5.30957 8.94 6.86957 10.55 8.85957 10.62C8.91957 10.61 9.04957 10.61 9.17957 10.62C11.1396 10.53 12.6796 8.92 12.6896 6.94C12.6896 4.91 11.0296 3.25 8.99957 3.25Z" fill="#858487"/>
                <path d="M16.5394 12.25C16.5094 12.25 16.4794 12.25 16.4494 12.24C16.0394 12.28 15.6194 11.99 15.5794 11.58C15.5394 11.17 15.7894 10.8 16.1994 10.75C16.3194 10.74 16.4494 10.74 16.5594 10.74C18.0194 10.66 19.1594 9.46 19.1594 7.99C19.1594 6.47 17.9294 5.24 16.4094 5.24C15.9994 5.25 15.6594 4.91 15.6594 4.5C15.6594 4.09 15.9994 3.75 16.4094 3.75C18.7494 3.75 20.6594 5.66 20.6594 8C20.6594 10.3 18.8594 12.16 16.5694 12.25C16.5594 12.25 16.5494 12.25 16.5394 12.25Z" fill="#858487"/>
                <path d="M9.16961 23.05C7.20961 23.05 5.23961 22.55 3.74961 21.55C2.35961 20.63 1.59961 19.37 1.59961 18C1.59961 16.63 2.35961 15.36 3.74961 14.43C6.74961 12.44 11.6096 12.44 14.5896 14.43C15.9696 15.35 16.7396 16.61 16.7396 17.98C16.7396 19.35 15.9796 20.62 14.5896 21.55C13.0896 22.55 11.1296 23.05 9.16961 23.05ZM4.57961 15.69C3.61961 16.33 3.09961 17.15 3.09961 18.01C3.09961 18.86 3.62961 19.68 4.57961 20.31C7.06961 21.98 11.2696 21.98 13.7596 20.31C14.7196 19.67 15.2396 18.85 15.2396 17.99C15.2396 17.14 14.7096 16.32 13.7596 15.69C11.2696 14.03 7.06961 14.03 4.57961 15.69Z" fill="#858487"/>
                <path d="M18.3397 21.25C17.9897 21.25 17.6797 21.01 17.6097 20.65C17.5297 20.24 17.7897 19.85 18.1897 19.76C18.8197 19.63 19.3997 19.38 19.8497 19.03C20.4197 18.6 20.7297 18.06 20.7297 17.49C20.7297 16.92 20.4197 16.38 19.8597 15.96C19.4197 15.62 18.8697 15.38 18.2197 15.23C17.8197 15.14 17.5597 14.74 17.6497 14.33C17.7397 13.93 18.1397 13.67 18.5497 13.76C19.4097 13.95 20.1597 14.29 20.7697 14.76C21.6997 15.46 22.2297 16.45 22.2297 17.49C22.2297 18.53 21.6897 19.52 20.7597 20.23C20.1397 20.71 19.3597 21.06 18.4997 21.23C18.4397 21.25 18.3897 21.25 18.3397 21.25Z" fill="#858487"/>
            </svg>
            Owner
        </div>
        <div class="col-2 text-center">
            <svg class="me-2" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 2.5V5.5" stroke="#A3A3A5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 2.5V5.5" stroke="#A3A3A5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.5 9.58997H20.5" stroke="#A3A3A5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 9V17.5C21 20.5 19.5 22.5 16 22.5H8C4.5 22.5 3 20.5 3 17.5V9C3 6 4.5 4 8 4H16C19.5 4 21 6 21 9Z" stroke="#A3A3A5" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.6947 14.2H15.7037" stroke="#A3A3A5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.6947 17.2H15.7037" stroke="#A3A3A5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.9955 14.2H12.0045" stroke="#A3A3A5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.9955 17.2H12.0045" stroke="#A3A3A5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.29431 14.2H8.30329" stroke="#A3A3A5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.29431 17.2H8.30329" stroke="#A3A3A5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                        
            Due Date
        </div>
        <div class="col-3 text-center">
            <svg class="me-2" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.50977 7C4.95977 7 4.50977 6.55 4.50977 6C4.50977 5.45 4.94977 5 5.50977 5H5.51977C6.06977 5 6.51977 5.45 6.51977 6C6.51977 6.55 6.06977 7 5.50977 7Z" fill="#858487"/>
                <path d="M18.5098 20C17.9598 20 17.5098 19.55 17.5098 19C17.5098 18.45 17.9498 18 18.5098 18H18.5198C19.0698 18 19.5198 18.45 19.5198 19C19.5198 19.55 19.0698 20 18.5098 20Z" fill="#858487"/>
                <path d="M5.47021 10.25C3.13021 10.25 1.22021 8.34 1.22021 6C1.22021 3.66 3.13021 1.75 5.47021 1.75C7.81021 1.75 9.72021 3.66 9.72021 6C9.72021 8.34 7.82021 10.25 5.47021 10.25ZM5.47021 3.25C3.95021 3.25 2.72021 4.48 2.72021 6C2.72021 7.52 3.95021 8.75 5.47021 8.75C6.99021 8.75 8.22021 7.52 8.22021 6C8.22021 4.48 6.99021 3.25 5.47021 3.25Z" fill="#858487"/>
                <path d="M19.9702 23.25H16.9702C15.4502 23.25 14.2202 22.02 14.2202 20.5V17.5C14.2202 15.98 15.4502 14.75 16.9702 14.75H19.9702C21.4902 14.75 22.7202 15.98 22.7202 17.5V20.5C22.7202 22.02 21.4902 23.25 19.9702 23.25ZM16.9702 16.25C16.2802 16.25 15.7202 16.81 15.7202 17.5V20.5C15.7202 21.19 16.2802 21.75 16.9702 21.75H19.9702C20.6602 21.75 21.2202 21.19 21.2202 20.5V17.5C21.2202 16.81 20.6602 16.25 19.9702 16.25H16.9702Z" fill="#858487"/>
                <path d="M11.9999 20.25H9.31994C8.15994 20.25 7.14994 19.55 6.74994 18.47C6.33994 17.39 6.63994 16.2 7.50994 15.43L15.4999 8.44C15.9799 8.02 15.9899 7.45 15.8499 7.06C15.6999 6.67 15.3199 6.25 14.6799 6.25H11.9999C11.5899 6.25 11.2499 5.91 11.2499 5.5C11.2499 5.09 11.5899 4.75 11.9999 4.75H14.6799C15.8399 4.75 16.8499 5.45 17.2499 6.53C17.6599 7.61 17.3599 8.8 16.4899 9.57L8.49994 16.56C8.01994 16.98 8.00994 17.55 8.14994 17.94C8.29994 18.33 8.67994 18.75 9.31994 18.75H11.9999C12.4099 18.75 12.7499 19.09 12.7499 19.5C12.7499 19.91 12.4099 20.25 11.9999 20.25Z" fill="#858487"/>
            </svg>                        
            Progress
        </div>
    </div>
    @forelse ($projects as $item)
    <div class="wrapper position-relative dotMenuButtonWrapper">
        <div class="dropdown position-absolute top-0 end-0">
            <button class="btn" type="button" id="dotMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="5" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> <circle cx="12" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> <circle cx="19" cy="12" r="2" stroke="#858487" stroke-width="1.5"></circle> </g></svg>
            </button>
            <div class="dropdown-menu" aria-labelledby="dotMenuButton">
                @if ($user->id == $item->userID)
                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#edit-project-modal" data-action="edit" data-project-id="{{ $item->id }}" data-project-name="{{ $item->projectName }}" data-project-description="{{ $item->projectDescription }}" data-project-due-date="{{ $item->projectDueDate }}">Edit Project</button>
                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#project-action-modal" data-action="delete" data-project-id="{{ $item->id }}" data-project-name="{{ $item->projectName }}">Delete Project</button>
                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#project-action-modal" data-action="complete" data-project-id="{{ $item->id }}" data-project-name="{{ $item->projectName }}">Complete Project</button>
                @else
                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#project-action-modal" data-action="leave" data-project-id="{{ $item->id }}" data-project-name="{{ $item->projectName }}">Leave Project</button>
                @endif
            </div>
        </div>
        @include('components.edit-project-form')
        @include('components.project-action-form')
        <a class="hover-5 row project-item mx-0 px-0 my-2 text-decoration-none text-dark" href="{{Route('project', $item->id)}}">
            <div class="col-4 p-0">
                <div class="d-flex flex-row mx-0 w-100 h-100 px-0">
                    <svg class="bg-primary-70" class="h-100" width="20" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.70816 4.26515C7.70816 2.96854 8.73317 1.91931 9.99983 1.91931C11.2665 1.91931 12.2915 2.96854 12.2915 4.26515C12.2915 5.56176 11.2665 6.61098 9.99983 6.61098C8.73317 6.61098 7.70816 5.56176 7.70816 4.26515ZM11.0415 4.26515C11.0415 3.67656 10.5748 3.19886 9.99983 3.19886C9.42483 3.19886 8.95817 3.67656 8.95817 4.26515C8.95817 4.85374 9.42483 5.33144 9.99983 5.33144C10.5748 5.33144 11.0415 4.85374 11.0415 4.26515Z" fill="white"/>
                        <path d="M7.70816 16.2077C7.70816 14.911 8.73317 13.8618 9.99983 13.8618C11.2665 13.8618 12.2915 14.911 12.2915 16.2077C12.2915 17.5043 11.2665 18.5535 9.99983 18.5535C8.73317 18.5535 7.70816 17.5043 7.70816 16.2077ZM11.0415 16.2077C11.0415 15.6191 10.5748 15.1414 9.99983 15.1414C9.42483 15.1414 8.95817 15.6191 8.95817 16.2077C8.95817 16.7962 9.42483 17.2739 9.99983 17.2739C10.5748 17.2739 11.0415 16.7962 11.0415 16.2077Z" fill="white"/>
                        <path d="M7.70816 10.2363C7.70816 8.93973 8.73317 7.8905 9.99983 7.8905C11.2665 7.8905 12.2915 8.93973 12.2915 10.2363C12.2915 11.5329 11.2665 12.5822 9.99983 12.5822C8.73317 12.5822 7.70816 11.5329 7.70816 10.2363ZM11.0415 10.2363C11.0415 9.64775 10.5748 9.17005 9.99983 9.17005C9.42483 9.17005 8.95817 9.64775 8.95817 10.2363C8.95817 10.8249 9.42483 11.3026 9.99983 11.3026C10.5748 11.3026 11.0415 10.8249 11.0415 10.2363Z" fill="white"/>
                    </svg>    
                    <img class="img-fluid" src="{{ asset($item->projectWallpaperURL) }}">
                    <div class="px-3 w-100">
                        <div class="fs-3 fw-semibold">{{$item->projectName}}</div>
                        <div class="truncate">{{$item->projectDescription ?? ""}}</div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-2 p-0 py-2">Status</div> --}}
            @if ($user->id == $item->userID)
                <div class="text-primary-70 fw-semibold col-3 px-3 py-2">{{$item->firstName . " " . $item->lastName}}</div>
            @else
                <div class="col-3 px-3 py-2">{{$item->firstName . " " . $item->lastName}}</div>
            @endif
            <div class="col-2 p-0 py-2 text-center">
                @php
                    $daysDifference = floor((strtotime($item->projectDueDate) - strtotime(date('Y-m-d'))) / (60 * 60 * 24));
                    $dueDateFormatted = date('F j, Y', strtotime($item->projectDueDate));
                @endphp
                @if ($daysDifference < 7)
                    <span class="bg-Error-50 rounded-circle d-inline-block me-2 fs-5" style="width: 0.6em; height: 0.6em;"></span>
                @elseif ($daysDifference < 30)
                    <span class="bg-warning-50 rounded-circle d-inline-block me-2 fs-5" style="width: 0.6em; height: 0.6em;"></span>
                @else
                    <span class="bg-primary-50 rounded-circle d-inline-block me-2 fs-5" style="width: 0.6em; height: 0.6em;"></span>
                @endif
                {{ $dueDateFormatted }}
            </div>
            <div class="col-3 px-lg-5 px-md-3 py-2 text-center"><div class="px-lg-5 px-md-3">
                <div class="progress fs-6" style="height: 0.7em">
                    <div class="progress-bar bg-success-50" role="progressbar" style="width: {{ $item->projectProgress }}%" aria-valuenow="{{ $item->projectProgress }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{ $item->projectProgress . "%" }}
            </div></div>
        </a>   
    </div> 
    @empty
    <div class="row p-5 w-100 fs-3 d-flex justify-content-center">
        Tidak ada data.
    </div>          
    @endforelse
</div>
@endsection