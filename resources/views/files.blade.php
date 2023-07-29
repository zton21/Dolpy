<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/css/master.css" rel="stylesheet" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Files</title>
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
    </style>
</head>
<body>
    @include('layout.project-nav', ['filesActive' => "active"])

    <div class="container vh-100" style="padding-top: 90px;">
        <div class="row h-100 border">
            <div class="col-5 p-0 h-100">
                <div class="container-fluid p-0">
                    <div class="card p-0">
                        {{-- <img style="height: 4em" src="{{ asset($project->projectWallpaperURL) }}" class="img-fluid card-img-top"> --}}
                        <img style="height: 4em" src="{{asset('img/WebProgrammingWallpaper.png')}}" class="img-fluid card-img-top">
                        <div class="card-body bg-primary-10">
                            <h3>{{ $project->projectName }}</h3>
                            <span>{{ $project->projectDescription }}</span>
                        </div>
                    </div>
                    <div class="row m-0 py-3 justify-content-between">
                        <div class="col-6">
                            <h3 class="m-0">Section List</h3>
                        </div>
                        <div class="col-auto com-sm-3">
                            <button onclick="openAddFileSectionFormModal()" class="btn bg-primary-50 btndolpy">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Zm10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16Z"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4V7Z"/></g></svg>
                                <span class="text-white my-auto">Add File Section</span>
                            </button>
                            <x-add-file-section-form></x-add-file-section-form>
                        </div>
                    </div>
                    @forelse ($files as $item)
                    <a class="text-decoration-none text-black" href="?id={{ $item->id }}">
                        <div class="d-flex flex-column overflow-y-auto m-2 h-100">
                            <div class="row p-2 m-1 border rounded-3 align-items-center">
                                <div class="col-6">
                                    <h4>{{ $item->fileSectionName }}</h4>
                                    <div class="text-secondary">{{ $item->fileSectionDate }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="row align-items-center justify-content-end">
                                        <div class="col-auto p-0">
                                            <img src="{{ asset('storage/' . $item->profileURL) }}" class="img-fluid rounded-circle" style="width: 40px;">
                                        </div>
                                        <div class="col-8">
                                            by {{ $item->firstName . " " . $item->lastName }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                        No file section, try to create one
                    @endforelse
                    
                </div>
            </div>
            @isset($file)
            <div class="col-7 h-100 border p-0">
                <div class="container-fluid p-0 h-100 d-flex flex-column">
                    <div class="d-flex flex-row gap-2 py-2 px-3 align-items-center">
                        <h1>{{ $file->fileSectionName }}</h1>
                        <div class="me-auto" class="text-secondary">{{ $file->fileSectionDate }}</div>
                    </div>
                    <div class="d-flex flex-row px-3 pb-3 gap-2 align-items-center">
                        <div class="me-auto fs-5">{{ $file->fileSectionDescription }}</div>
                    </div>
                    <hr class="p-0 my-0">
                    <div class="d-flex flex-column p-2 h-100 overflow-y-auto overflow-x-hidden bg-primary-5">
                    @forelse ($attachments as $item)
                        @if ($item->attachmentType == 'image')
                            @if ($item->user_id == $user->id)
                                {{-- User Image --}}
                                <div class="row px-4 py-2">
                                    <div class="offset-1 col-10">
                                        <div class="d-flex flex-row-reverse gap-2">
                                            <div>Gundul Pacul</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-2 rounded shadow d-inline-flex flex-wrap bg-primary-10">
                                                <img class="w-100" src="{{URL::asset('img/dolpy_ads.png')}}" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            @else
                                {{-- Other Image --}}
                                <div class="row px-4 py-2">
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex flex-row gap-2">
                                            <div>Gundul Pacul</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="p-2 rounded shadow d-inline-flex text-break bg-white flex-wrap">
                                                <img class="w-100" src="{{URL::asset('img/profilePicture.png')}}" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @elseif ($item->attachmentType == 'file')
                            @if ($item->user_id == $user->id)
                                {{-- User File --}}
                                <div class="row px-4 py-2">
                                    <div class="offset-1 col-10">
                                        <div class="d-flex flex-row-reverse gap-2">
                                            <div>Gundul Pacul</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-2 rounded shadow d-inline-flex flex-wrap bg-primary-10 text-end">
                                                <div class="col-auto ps-0">
                                                    <div style="font-size: calc(0.7rem + 0.1vw);">
                                                        Design System - 1.docx
                                                    </div>
                                                    <div style="font-size: calc(0.7rem + 0.1vw); color: #A3A3A5;">
                                                        18 KB, Word.Document.12
                                                    </div>
                                                </div>
                                                <div class="col-auto my-auto ms-2">
                                                    <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M29.9118 1.6787e-06H9.05556C8.88464 -0.000129698 8.71536 0.0305722 8.5574 0.0903544C8.39943 0.150137 8.25587 0.237829 8.13491 0.348423C8.01395 0.459018 7.91796 0.590349 7.85242 0.734919C7.78688 0.879489 7.75307 1.03447 7.75293 1.191V6.5L19.8391 9.75L31.2155 6.5V1.191C31.2153 1.03438 31.1815 0.879323 31.1159 0.734688C31.0503 0.590053 30.9542 0.458677 30.8331 0.348069C30.712 0.237462 30.5684 0.149791 30.4103 0.0900671C30.2522 0.0303438 30.0828 -0.000261161 29.9118 1.6787e-06Z" fill="#41A5EE"/>
                                                        <path d="M31.2155 6.5H7.75293V13L19.8391 14.95L31.2155 13V6.5Z" fill="#2B7CD3"/>
                                                        <path d="M7.75293 13V19.5L19.1283 20.8L31.2155 19.5V13H7.75293Z" fill="#185ABD"/>
                                                        <path d="M9.05556 26H29.9107C30.0818 26.0004 30.2513 25.9699 30.4095 25.9102C30.5677 25.8506 30.7115 25.7629 30.8327 25.6523C30.9539 25.5417 31.0501 25.4102 31.1158 25.2655C31.1815 25.1208 31.2153 24.9657 31.2155 24.809V19.5H7.75293V24.809C7.75307 24.9655 7.78688 25.1205 7.85242 25.2651C7.91796 25.4097 8.01395 25.541 8.13491 25.6516C8.25587 25.7622 8.39943 25.8499 8.5574 25.9096C8.71536 25.9694 8.88464 26.0001 9.05556 26Z" fill="#103F91"/>
                                                        <path opacity="0.1" d="M16.4029 5.19995H7.75293V21.4499H16.4029C16.7476 21.4484 17.0777 21.3225 17.3217 21.0996C17.5657 20.8766 17.704 20.5746 17.7066 20.259V6.39095C17.704 6.07529 17.5657 5.77327 17.3217 5.55034C17.0777 5.32741 16.7476 5.20152 16.4029 5.19995Z" fill="black"/>
                                                        <path opacity="0.2" d="M15.6921 5.84998H7.75293V22.1H15.6921C16.0367 22.0984 16.3669 21.9725 16.6109 21.7496C16.8549 21.5267 16.9932 21.2246 16.9958 20.909V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                                                        <path opacity="0.2" d="M15.6921 5.84998H7.75293V20.8H15.6921C16.0367 20.7984 16.3669 20.6725 16.6109 20.4496C16.8549 20.2267 16.9932 19.9246 16.9958 19.609V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                                                        <path opacity="0.2" d="M14.9812 5.84998H7.75293V20.8H14.9812C15.3259 20.7984 15.656 20.6725 15.9001 20.4496C16.1441 20.2267 16.2824 19.9246 16.285 19.609V7.04098C16.2824 6.72531 16.1441 6.4233 15.9001 6.20037C15.656 5.97743 15.3259 5.85155 14.9812 5.84998Z" fill="black"/>
                                                        <path d="M1.9463 5.84998H14.9813C15.3266 5.84971 15.6579 5.97501 15.9023 6.19834C16.1468 6.42166 16.2844 6.72475 16.285 7.04098V18.959C16.2844 19.2752 16.1468 19.5783 15.9023 19.8016C15.6579 20.0249 15.3266 20.1502 14.9813 20.15H1.9463C1.77528 20.1502 1.60589 20.1196 1.4478 20.0599C1.28971 20.0002 1.14602 19.9125 1.02495 19.8019C0.903871 19.6913 0.807782 19.5599 0.742174 19.4153C0.676565 19.2707 0.642721 19.1156 0.642578 18.959V7.04098C0.642721 6.88436 0.676565 6.7293 0.742174 6.58466C0.807782 6.44003 0.903871 6.30865 1.02495 6.19804C1.14602 6.08744 1.28971 5.99977 1.4478 5.94004C1.60589 5.88032 1.77528 5.84971 1.9463 5.84998Z" fill="url(#paint0_linear_750_2623)"/>
                                                        <path d="M5.9932 14.988C6.01832 15.172 6.03579 15.332 6.04343 15.469H6.074C6.08492 15.339 6.10894 15.182 6.14498 14.999C6.18101 14.816 6.21267 14.661 6.24216 14.534L7.61248 9.127H9.38571L10.8052 14.453C10.8878 14.7824 10.9469 15.1165 10.9821 15.453H11.0061C11.0322 15.1254 11.0814 14.7997 11.1535 14.478L12.288 9.12H13.9007L11.9091 16.868H10.0234L8.67271 11.742C8.6334 11.594 8.58899 11.4013 8.53949 11.164C8.49 10.9267 8.45942 10.7533 8.44778 10.644H8.42485C8.40956 10.77 8.37899 10.957 8.33313 11.205C8.28727 11.454 8.25124 11.637 8.22394 11.757L6.95407 16.871H5.03671L3.03418 9.127H4.67202L5.90694 14.545C5.9438 14.6912 5.97259 14.8391 5.9932 14.988Z" fill="white"/>
                                                        <defs>
                                                        <linearGradient id="paint0_linear_750_2623" x1="3.36575" y1="4.91398" x2="12.2772" y2="21.7653" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#2368C4"/>
                                                        <stop offset="0.5" stop-color="#1A5DBE"/>
                                                        <stop offset="1" stop-color="#1146AC"/>
                                                        </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            @else
                                {{-- Other File --}}
                                <div class="row px-4 py-2">
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex flex-row gap-2">
                                            <div>Gundul Pacul</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="p-2 rounded shadow d-inline-flex text-break bg-white flex-wrap">
                                                <div class="col-auto my-auto me-2">
                                                    <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M29.9118 1.6787e-06H9.05556C8.88464 -0.000129698 8.71536 0.0305722 8.5574 0.0903544C8.39943 0.150137 8.25587 0.237829 8.13491 0.348423C8.01395 0.459018 7.91796 0.590349 7.85242 0.734919C7.78688 0.879489 7.75307 1.03447 7.75293 1.191V6.5L19.8391 9.75L31.2155 6.5V1.191C31.2153 1.03438 31.1815 0.879323 31.1159 0.734688C31.0503 0.590053 30.9542 0.458677 30.8331 0.348069C30.712 0.237462 30.5684 0.149791 30.4103 0.0900671C30.2522 0.0303438 30.0828 -0.000261161 29.9118 1.6787e-06Z" fill="#41A5EE"/>
                                                        <path d="M31.2155 6.5H7.75293V13L19.8391 14.95L31.2155 13V6.5Z" fill="#2B7CD3"/>
                                                        <path d="M7.75293 13V19.5L19.1283 20.8L31.2155 19.5V13H7.75293Z" fill="#185ABD"/>
                                                        <path d="M9.05556 26H29.9107C30.0818 26.0004 30.2513 25.9699 30.4095 25.9102C30.5677 25.8506 30.7115 25.7629 30.8327 25.6523C30.9539 25.5417 31.0501 25.4102 31.1158 25.2655C31.1815 25.1208 31.2153 24.9657 31.2155 24.809V19.5H7.75293V24.809C7.75307 24.9655 7.78688 25.1205 7.85242 25.2651C7.91796 25.4097 8.01395 25.541 8.13491 25.6516C8.25587 25.7622 8.39943 25.8499 8.5574 25.9096C8.71536 25.9694 8.88464 26.0001 9.05556 26Z" fill="#103F91"/>
                                                        <path opacity="0.1" d="M16.4029 5.19995H7.75293V21.4499H16.4029C16.7476 21.4484 17.0777 21.3225 17.3217 21.0996C17.5657 20.8766 17.704 20.5746 17.7066 20.259V6.39095C17.704 6.07529 17.5657 5.77327 17.3217 5.55034C17.0777 5.32741 16.7476 5.20152 16.4029 5.19995Z" fill="black"/>
                                                        <path opacity="0.2" d="M15.6921 5.84998H7.75293V22.1H15.6921C16.0367 22.0984 16.3669 21.9725 16.6109 21.7496C16.8549 21.5267 16.9932 21.2246 16.9958 20.909V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                                                        <path opacity="0.2" d="M15.6921 5.84998H7.75293V20.8H15.6921C16.0367 20.7984 16.3669 20.6725 16.6109 20.4496C16.8549 20.2267 16.9932 19.9246 16.9958 19.609V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                                                        <path opacity="0.2" d="M14.9812 5.84998H7.75293V20.8H14.9812C15.3259 20.7984 15.656 20.6725 15.9001 20.4496C16.1441 20.2267 16.2824 19.9246 16.285 19.609V7.04098C16.2824 6.72531 16.1441 6.4233 15.9001 6.20037C15.656 5.97743 15.3259 5.85155 14.9812 5.84998Z" fill="black"/>
                                                        <path d="M1.9463 5.84998H14.9813C15.3266 5.84971 15.6579 5.97501 15.9023 6.19834C16.1468 6.42166 16.2844 6.72475 16.285 7.04098V18.959C16.2844 19.2752 16.1468 19.5783 15.9023 19.8016C15.6579 20.0249 15.3266 20.1502 14.9813 20.15H1.9463C1.77528 20.1502 1.60589 20.1196 1.4478 20.0599C1.28971 20.0002 1.14602 19.9125 1.02495 19.8019C0.903871 19.6913 0.807782 19.5599 0.742174 19.4153C0.676565 19.2707 0.642721 19.1156 0.642578 18.959V7.04098C0.642721 6.88436 0.676565 6.7293 0.742174 6.58466C0.807782 6.44003 0.903871 6.30865 1.02495 6.19804C1.14602 6.08744 1.28971 5.99977 1.4478 5.94004C1.60589 5.88032 1.77528 5.84971 1.9463 5.84998Z" fill="url(#paint0_linear_750_2623)"/>
                                                        <path d="M5.9932 14.988C6.01832 15.172 6.03579 15.332 6.04343 15.469H6.074C6.08492 15.339 6.10894 15.182 6.14498 14.999C6.18101 14.816 6.21267 14.661 6.24216 14.534L7.61248 9.127H9.38571L10.8052 14.453C10.8878 14.7824 10.9469 15.1165 10.9821 15.453H11.0061C11.0322 15.1254 11.0814 14.7997 11.1535 14.478L12.288 9.12H13.9007L11.9091 16.868H10.0234L8.67271 11.742C8.6334 11.594 8.58899 11.4013 8.53949 11.164C8.49 10.9267 8.45942 10.7533 8.44778 10.644H8.42485C8.40956 10.77 8.37899 10.957 8.33313 11.205C8.28727 11.454 8.25124 11.637 8.22394 11.757L6.95407 16.871H5.03671L3.03418 9.127H4.67202L5.90694 14.545C5.9438 14.6912 5.97259 14.8391 5.9932 14.988Z" fill="white"/>
                                                        <defs>
                                                        <linearGradient id="paint0_linear_750_2623" x1="3.36575" y1="4.91398" x2="12.2772" y2="21.7653" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#2368C4"/>
                                                        <stop offset="0.5" stop-color="#1A5DBE"/>
                                                        <stop offset="1" stop-color="#1146AC"/>
                                                        </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="col-auto ps-0">
                                                    <div style="font-size: calc(0.7rem + 0.1vw);">
                                                        Design System - 1.docx
                                                    </div>
                                                    <div style="font-size: calc(0.7rem + 0.1vw); color: #A3A3A5;">
                                                        18 KB, Word.Document.12
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @elseif ($item->attachmentType == 'link')
                            @if ($item->user_id == $user->id)
                                {{-- User Link --}}
                                <div class="row px-4 py-2">
                                    <div class="offset-1 col-10">
                                        <div class="d-flex flex-row-reverse gap-2">
                                            <div>Gundul Pacul</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="p-2 bg-primary-10 rounded shadow d-inline-block text-break text-end">
                                            <a href="https://www.figma.com/file/aL5K3TFy3cKzPcGW8kLkS3/Untitled?node-id=0%3A1&t=VpoK06QUPm6RHQCD-1">https://www.figma.com/file/aL5K3TFy3cKzPcGW8kLkS3/Untitled?node-id=0%3A1&t=VpoK06QUPm6RHQCD-1</a>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            @else
                                {{-- Other Link --}}
                                <div class="row px-4 py-2">
                                    <div class="col-1">
                                        <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex flex-row gap-2">
                                            <div>Gundul Pacul</div>
                                            <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                        </div>
                                        <div class="p-2 bg-white rounded shadow d-inline-block text-break">
                                            <a href="https://www.figma.com/file/aL5K3TFy3cKzPcGW8kLkS3/Untitled?node-id=0%3A1&t=VpoK06QUPm6RHQCD-1">https://www.figma.com/file/aL5K3TFy3cKzPcGW8kLkS3/Untitled?node-id=0%3A1&t=VpoK06QUPm6RHQCD-1</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    
                        {{-- <div class="d-flex flex-row align-items-center gap-4 mx-3 my-2">
                            <img src="{{URL::asset('img/profilePicture.png')}}" alt="Profile Picture" class="img-fluid rounded-circle" style="height: 40px; width: 40px;">
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row gap-2">
                                    <div>Gundul Pacul</div>
                                    <div class="text-secondary" style="font-size: 12px">10/1/2023 - 02.39 PM</div>
                                </div>
                                <div class="p-2 bg-white rounded shadow d-inline-block text-break">
                                    <div class="row">
                                        <div class="col-auto my-auto mx-auto">
                                            <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M29.9118 1.6787e-06H9.05556C8.88464 -0.000129698 8.71536 0.0305722 8.5574 0.0903544C8.39943 0.150137 8.25587 0.237829 8.13491 0.348423C8.01395 0.459018 7.91796 0.590349 7.85242 0.734919C7.78688 0.879489 7.75307 1.03447 7.75293 1.191V6.5L19.8391 9.75L31.2155 6.5V1.191C31.2153 1.03438 31.1815 0.879323 31.1159 0.734688C31.0503 0.590053 30.9542 0.458677 30.8331 0.348069C30.712 0.237462 30.5684 0.149791 30.4103 0.0900671C30.2522 0.0303438 30.0828 -0.000261161 29.9118 1.6787e-06Z" fill="#41A5EE"/>
                                                <path d="M31.2155 6.5H7.75293V13L19.8391 14.95L31.2155 13V6.5Z" fill="#2B7CD3"/>
                                                <path d="M7.75293 13V19.5L19.1283 20.8L31.2155 19.5V13H7.75293Z" fill="#185ABD"/>
                                                <path d="M9.05556 26H29.9107C30.0818 26.0004 30.2513 25.9699 30.4095 25.9102C30.5677 25.8506 30.7115 25.7629 30.8327 25.6523C30.9539 25.5417 31.0501 25.4102 31.1158 25.2655C31.1815 25.1208 31.2153 24.9657 31.2155 24.809V19.5H7.75293V24.809C7.75307 24.9655 7.78688 25.1205 7.85242 25.2651C7.91796 25.4097 8.01395 25.541 8.13491 25.6516C8.25587 25.7622 8.39943 25.8499 8.5574 25.9096C8.71536 25.9694 8.88464 26.0001 9.05556 26Z" fill="#103F91"/>
                                                <path opacity="0.1" d="M16.4029 5.19995H7.75293V21.4499H16.4029C16.7476 21.4484 17.0777 21.3225 17.3217 21.0996C17.5657 20.8766 17.704 20.5746 17.7066 20.259V6.39095C17.704 6.07529 17.5657 5.77327 17.3217 5.55034C17.0777 5.32741 16.7476 5.20152 16.4029 5.19995Z" fill="black"/>
                                                <path opacity="0.2" d="M15.6921 5.84998H7.75293V22.1H15.6921C16.0367 22.0984 16.3669 21.9725 16.6109 21.7496C16.8549 21.5267 16.9932 21.2246 16.9958 20.909V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                                                <path opacity="0.2" d="M15.6921 5.84998H7.75293V20.8H15.6921C16.0367 20.7984 16.3669 20.6725 16.6109 20.4496C16.8549 20.2267 16.9932 19.9246 16.9958 19.609V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                                                <path opacity="0.2" d="M14.9812 5.84998H7.75293V20.8H14.9812C15.3259 20.7984 15.656 20.6725 15.9001 20.4496C16.1441 20.2267 16.2824 19.9246 16.285 19.609V7.04098C16.2824 6.72531 16.1441 6.4233 15.9001 6.20037C15.656 5.97743 15.3259 5.85155 14.9812 5.84998Z" fill="black"/>
                                                <path d="M1.9463 5.84998H14.9813C15.3266 5.84971 15.6579 5.97501 15.9023 6.19834C16.1468 6.42166 16.2844 6.72475 16.285 7.04098V18.959C16.2844 19.2752 16.1468 19.5783 15.9023 19.8016C15.6579 20.0249 15.3266 20.1502 14.9813 20.15H1.9463C1.77528 20.1502 1.60589 20.1196 1.4478 20.0599C1.28971 20.0002 1.14602 19.9125 1.02495 19.8019C0.903871 19.6913 0.807782 19.5599 0.742174 19.4153C0.676565 19.2707 0.642721 19.1156 0.642578 18.959V7.04098C0.642721 6.88436 0.676565 6.7293 0.742174 6.58466C0.807782 6.44003 0.903871 6.30865 1.02495 6.19804C1.14602 6.08744 1.28971 5.99977 1.4478 5.94004C1.60589 5.88032 1.77528 5.84971 1.9463 5.84998Z" fill="url(#paint0_linear_750_2623)"/>
                                                <path d="M5.9932 14.988C6.01832 15.172 6.03579 15.332 6.04343 15.469H6.074C6.08492 15.339 6.10894 15.182 6.14498 14.999C6.18101 14.816 6.21267 14.661 6.24216 14.534L7.61248 9.127H9.38571L10.8052 14.453C10.8878 14.7824 10.9469 15.1165 10.9821 15.453H11.0061C11.0322 15.1254 11.0814 14.7997 11.1535 14.478L12.288 9.12H13.9007L11.9091 16.868H10.0234L8.67271 11.742C8.6334 11.594 8.58899 11.4013 8.53949 11.164C8.49 10.9267 8.45942 10.7533 8.44778 10.644H8.42485C8.40956 10.77 8.37899 10.957 8.33313 11.205C8.28727 11.454 8.25124 11.637 8.22394 11.757L6.95407 16.871H5.03671L3.03418 9.127H4.67202L5.90694 14.545C5.9438 14.6912 5.97259 14.8391 5.9932 14.988Z" fill="white"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_750_2623" x1="3.36575" y1="4.91398" x2="12.2772" y2="21.7653" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#2368C4"/>
                                                <stop offset="0.5" stop-color="#1A5DBE"/>
                                                <stop offset="1" stop-color="#1146AC"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div class="col-auto ps-0">
                                            <div style="font-size: calc(0.7rem + 0.1vw);">
                                                Design System - 1.docx
                                            </div>
                                            <div style="font-size: calc(0.7rem + 0.1vw); color: #A3A3A5;">
                                                18 KB, Word.Document.12
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @empty
                    
                    @endforelse
                    </div>
                    <hr class="p-0 my-0">
                    <div class="row px-2 py-2 mx-0 bg-white d-flex align-items-end">

                        {{-- <div class="position-absolute bottom-0 left-0 w-75 rounded-top bg-neutral-10 border p-2 d-flex flex-column align-items-center justify-content-center">
                            <img class="w-100" src="{{URL::asset('img/dolpy_ads.png')}}" alt="image">
                            <button type="button" class="col-md-2 ms-auto btn btn-primary">Post</button>
                        </div> --}}

                        <div class="d-flex flex-row gap-2 align-items-center justify-content-center">
                            <div class="col-md-4 text-center py-2">
                                <label for="fileInput">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.7077 18.3622C11.9785 18.3622 11.2389 18.081 10.6868 17.5289C10.1452 16.9872 9.8431 16.2685 9.8431 15.5081C9.8431 14.7477 10.1452 14.0185 10.6868 13.4872L12.1556 12.0185C12.4577 11.7164 12.9577 11.7164 13.2597 12.0185C13.5618 12.3206 13.5618 12.8206 13.2597 13.1227L11.791 14.5914C11.541 14.8414 11.4056 15.1643 11.4056 15.5081C11.4056 15.8518 11.541 16.1851 11.791 16.4247C12.3014 16.9351 13.1244 16.9351 13.6348 16.4247L15.9473 14.1122C17.2702 12.7893 17.2702 10.6435 15.9473 9.32057C14.6243 7.99766 12.4785 7.99766 11.1556 9.32057L8.63473 11.8414C8.10348 12.3726 7.81184 13.0706 7.81184 13.8102C7.81184 14.5497 8.10348 15.2581 8.63473 15.7789C8.93682 16.081 8.93682 16.581 8.63473 16.8831C8.33265 17.1851 7.83265 17.1851 7.53057 16.8831C6.70765 16.0601 6.25977 14.9664 6.25977 13.7997C6.25977 12.6331 6.70765 11.5393 7.53057 10.7164L10.0514 8.19556C11.9785 6.26847 15.1243 6.26847 17.0514 8.19556C18.9785 10.1226 18.9785 13.2685 17.0514 15.1956L14.7389 17.5081C14.1764 18.081 13.4473 18.3622 12.7077 18.3622Z" fill="#1D1D1D"/>
                                        <path d="M12.4997 23.956C6.32259 23.956 1.30176 18.9351 1.30176 12.758C1.30176 6.58095 6.32259 1.56012 12.4997 1.56012C18.6768 1.56012 23.6976 6.58095 23.6976 12.758C23.6976 18.9351 18.6768 23.956 12.4997 23.956ZM12.4997 3.12262C7.18717 3.12262 2.86426 7.44554 2.86426 12.758C2.86426 18.0705 7.18717 22.3935 12.4997 22.3935C17.8122 22.3935 22.1351 18.0705 22.1351 12.758C22.1351 7.44554 17.8122 3.12262 12.4997 3.12262Z" fill="#1D1D1D"/>
                                    </svg>
                                </label>
                                {{-- <input type="file" id="fileInput" name="fileInput" class="d-none"> --}}
                                <x-file-upload-modal :fileId="$file->id" />
                            </div>
                            <div class="col-md-4 text-center py-2">
                                <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6143 18.4872H17.1872C20.333 18.4872 22.9163 15.9143 22.9163 12.758C22.9163 9.6122 20.3434 7.02887 17.1872 7.02887H15.6143" stroke="#1D1D1D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.37468 7.02887H7.81217C4.65592 7.02887 2.08301 9.60179 2.08301 12.758C2.08301 15.9039 4.65592 18.4872 7.81217 18.4872H9.37468" stroke="#1D1D1D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.33301 12.7581H16.6663" stroke="#1D1D1D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="col-md-4 text-center py-2">
                                <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.1246 23.956H5.82249C4.23916 23.956 2.79124 23.1539 1.95791 21.7997C1.12458 20.4456 1.05166 18.7997 1.75999 17.3726L3.55166 13.7789C4.13499 12.6122 5.07249 11.8831 6.12458 11.7685C7.17666 11.6539 8.24958 12.1747 9.06208 13.1851L9.29124 13.4768C9.74958 14.0393 10.2808 14.3414 10.8017 14.2893C11.3225 14.2476 11.8017 13.8726 12.1558 13.2372L14.1246 9.68514C14.9371 8.2164 16.0204 7.45598 17.1975 7.50806C18.3642 7.57056 19.3642 8.44556 20.0308 9.98723L23.2912 17.6018C23.8954 19.0081 23.7496 20.6122 22.9058 21.8935C22.0725 23.1956 20.6558 23.956 19.1246 23.956ZM6.41624 13.331C6.37458 13.331 6.33291 13.331 6.29124 13.3414C5.77041 13.3935 5.29124 13.8101 4.94749 14.4872L3.15583 18.081C2.68708 19.0081 2.73916 20.1018 3.28083 20.9872C3.82249 21.8726 4.78083 22.4039 5.82249 22.4039H19.1142C20.135 22.4039 21.0412 21.9143 21.6037 21.0601C22.1662 20.206 22.26 19.1851 21.8537 18.2476L18.5933 10.6331C18.1975 9.69556 17.6454 9.12264 17.1142 9.10181C16.6246 9.07056 15.9892 9.5914 15.4892 10.4768L13.5204 14.0289C12.9162 15.1122 11.9683 15.7893 10.9371 15.8831C9.90583 15.9664 8.85374 15.4664 8.07249 14.4872L7.84333 14.1956C7.40583 13.6226 6.90583 13.331 6.41624 13.331Z" fill="#1D1D1D"/>
                                    <path d="M7.26074 9.37262C5.11491 9.37262 3.35449 7.62262 3.35449 5.46637C3.35449 3.31012 5.10449 1.56012 7.26074 1.56012C9.41699 1.56012 11.167 3.31012 11.167 5.46637C11.167 7.62262 9.41699 9.37262 7.26074 9.37262ZM7.26074 3.12262C5.96908 3.12262 4.91699 4.1747 4.91699 5.46637C4.91699 6.75804 5.96908 7.81012 7.26074 7.81012C8.55241 7.81012 9.60449 6.75804 9.60449 5.46637C9.60449 4.1747 8.55241 3.12262 7.26074 3.12262Z" fill="#1D1D1D"/>
                                </svg>
                            </div>
                        </div>
                    </div>
            </div>
            @endisset
            @empty($file)
            <div class="col-7 p-0 h-100">
                <div class="container-fluid px-5 h-100 d-flex flex-column align-items-center justify-content-center">
                    <img class="w-25 opacity-25" src="{{ asset('img/logo-primary.png') }}" alt="">
                    <div class="text-neutral-50 fs-5 text-center">Send and receive messages without keeping your phone online. Use Dolpy on up to <span class="text-primary-30">4 linked devices and 1 phone</span> at the same time</div>
                </div>
            </div>
            @endempty
        </div>
    </div>
    <script src="/js/masternav.js"></script>
</body>
</html>