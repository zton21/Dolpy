@extends('layout.master')

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
    .bg-hoverable:hover {
        background-color: #f2f2f2;
        transition: background-color 0.3s;
    }
    .profile-picture-container {
        position: relative;
        display: inline-block;
    }
    img {
        object-fit: cover;
    }
    .profile-picture-label {
        position: relative;
        cursor: pointer;
    }
    .profile-picture-overlay {
        height: 100%;
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        background-color: #f2f2f2b7;
        transition: opacity 0.3s;
        text-align: center;
    }
    .profile-picture-overlay i {
        font-size: 24px;
        color: #fff;
        margin-bottom: 8px;
    }
    .profile-picture-overlay-text {
        color: #ffffff;
    }
    .profile-picture-container:hover .profile-picture-overlay {
        opacity: 1;
    }
</style>

@section('title', "Manage Your Account | Dolpy")

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-12">
            <div class="d-flex flex-row align-items-center justify-content-center gap-3 my-4">
                <div class="profile-picture-container">
                    <label for="profilePicture" class="profile-picture-label">
                        <img id="profileImage" style="width: 3em; height: 3em;" src="{{ asset('storage/' . $user->profileURL) }}" alt="Profile Picture" class="img-fluid rounded-circle fs-1">
                        <div class="profile-picture-overlay d-flex flex-column justify-content-center align-items-center rounded-circle">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_15_137)"> <rect width="24" height="24"></rect> <path d="M3 8C3 7.44772 3.44772 7 4 7H8.5L9.5 4H14.5L15.5 7H20C20.5523 7 21 7.44772 21 8V19C21 19.5523 20.5523 20 20 20H4C3.44772 20 3 19.5523 3 19V8Z" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"></path> <circle cx="12" cy="13" r="3" stroke="#000000" stroke-linejoin="round"></circle> </g> <defs> <clipPath id="clip0_15_137"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>
                            <span class="profile-picture-overlay-text text-black" style="font-size: 0.8em">Change Image</span>
                        </div>
                    </label>
                    <input type="file" id="profilePicture" class="d-none" accept="image/*">
                </div>
                <div class="d-flex flex-column py-auto">
                    <h4 class="m-0">{{ $user->firstName }} {{ $user->lastName }}</h4>
                    <p class="m-0">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-12 border-top border-black">
            <div class="h3 text-center my-4">
                Manage your personal <span class="text-primary-70">information</span>
            </div> 
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 info-card">
            <div class="row align-items-center justify-content-center my-3 ">
                <div class="col-1">
                    <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 3.41665C9.47921 3.41665 2.91671 9.97915 2.91671 18C2.91671 26.0208 9.47921 32.5833 17.5 32.5833C25.5209 32.5833 32.0834 26.0208 32.0834 18C32.0834 9.97915 25.5209 3.41665 17.5 3.41665Z" stroke="#3980F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.5 23.8333V16.5416" stroke="#3980F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.5081 12.1667H17.495" stroke="#3980F3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>    
                </div>
                <div class="col-10 fs-5">
                    Manage your info, contact, dan password to make <span class="text-primary-70 fw-bold">Dolpy</span> work better for you.</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center my-3">
        <div class="col-lg-6 col-md-12 profile-card mx-2 pb-0 p-3">
            <div class="fs-3">
                Basic Info
            </div> 
            <a class="text-decoration-none" href="#">
                <div class="row py-3 bg-hoverable">
                    <div class="col-3 text-secondary">
                        Name
                    </div>
                    <div class="col-8 text-black">
                        {{ $user->firstName }} {{ $user->lastName }}
                    </div>
                    <div class="col-1">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </a>
            <a class="text-decoration-none" href="#">
                <div class="row py-3 border-top bg-hoverable">
                    <div class="col-3 text-secondary">
                        Birthday
                    </div>
                    <div class="col-8 text-black">
                        @if($user->birthday == NULL) <div class="text-secondary">Add Birthday</div>
                        @else{
                            {{ $user->birthday }}
                        }
                        @endif
                    </div>
                    <div class="col-1">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row justify-content-center align-items-center my-3">
        <div class="col-lg-6 col-md-12 profile-card mx-2 pb-0 p-3">
            <div class="fs-3">
                Contact Info
            </div> 
            <div class="row my-3">
                <div class="col-3 text-secondary">
                    Email
                </div>
                <div class="col-8">
                    {{ $user->email }}
                </div>
            </div>
            <a class="text-decoration-none" href="#">
                <div class="row py-3 border-top bg-hoverable">
                    <div class="col-3 text-secondary">
                        Phone
                    </div>
                    <div class="col-8 text-black">
                        {{ $user->phone }}
                    </div>
                    <div class="col-1">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row justify-content-center align-items-center my-3">
        <div class="col-lg-6 col-sm-12 profile-card mx-2 p-3">
            <div class="fs-3">
                Password
            </div> 
            A secure password helps protect your account
            
            <a class="text-decoration-none" href="#">
                <div class="row py-3 justify-content-between bg-hoverable">
                    <div class="col-8 text-secondary">
                        ************ {{-- {{ $user->password }} --}}
                    </div>
                    <div class="col-1">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.23508 2.06743L11.7229 7.79372C11.7881 7.86189 11.8337 7.93516 11.86 8.01356C11.8862 8.09195 11.8981 8.17558 11.8956 8.26443C11.8936 8.3533 11.8779 8.4363 11.8486 8.51343C11.8193 8.59056 11.7703 8.66169 11.7017 8.72681L5.95875 14.2143C5.7997 14.3663 5.60353 14.4396 5.37026 14.4343C5.13699 14.429 4.93894 14.3411 4.7761 14.1707C4.61327 14.0003 4.53438 13.804 4.53943 13.5818C4.54449 13.3597 4.63222 13.1672 4.80264 13.0043L9.81281 8.21705L5.02552 3.20688C4.87354 3.04782 4.80015 2.85433 4.80533 2.62639C4.81052 2.39844 4.89831 2.20328 5.06872 2.04089C5.23913 1.87806 5.43542 1.79917 5.65759 1.80422C5.87975 1.80928 6.07225 1.89701 6.23508 2.06743Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </a>
            Last changed Jan 18
        </div>
    </div>
</div>


<script>
    $(() => {
        $('#profilePicture:file').change(function(e) {
            // let url = URL.createObjectURL(e.target.files[0]);
            let fd = new FormData();
            fd.append('profile_picture', e.target.files[0]);
            
            $.post({
                url: '{{ route('profile') }}',
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    let url = URL.createObjectURL(e.target.files[0]);
                    $('#profileImage').attr('src', url);
                    $('#profileImageNav').attr('src', url);
                },
            });
        });
    });
</script>


@endsection