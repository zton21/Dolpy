<style>
#header .background {
    top:-35vh;
    z-index: -1;
}
#watch {
    width: fit-content !important;
}
#header svg {
    width: 100vw;
}
</style>
<div class="background position-absolute">
    <svg viewBox="0 0 1440 793" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d_60_37)">
        <path d="M-1 784V0H1442V633.251C1442 633.251 1241.56 729.924 1072 714C902.441 698.076 695.241 633.251 413.644 672C132.046 710.749 -1 784 -1 784Z" fill="url(#paint0_linear_60_37)"/>
        {{-- <path d="M-1 784V0H1442V633.251C1442 633.251 1241.56 729.924 1072 714C902.441 698.076 695.241 633.251 413.644 672C132.046 710.749 -1 784 -1 784Z" stroke="black"/> --}}
        </g>
        <defs>
        <filter id="filter0_d_60_37" x="-5.5" y="-0.5" width="1452" height="793.346" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset dy="4"/>
        <feGaussianBlur stdDeviation="2"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_60_37"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_60_37" result="shape"/>
        </filter>
        <linearGradient id="paint0_linear_60_37" x1="88.531" y1="724.019" x2="1304.23" y2="144.255" gradientUnits="userSpaceOnUse">
        <stop stop-color="#3980F3"/>
        <stop offset="1" stop-color="#00B8D9"/>
        </linearGradient>
        </defs>
    </svg>        
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 the-prologue text-neutral-10">
            <p class="row fw-bold display-4">Dolpy brings all your task, teammates, and tools together</b></p>
            <h3 class="row fw-normal fs-5 mb-4">Keep everything in the same place—even if your team isn’t.</h3>
            <form class="row my-5">
                <input type="text" class="col-7 border-0 rounded py-2 px-4" id="email" placeholder="Your Email">
                <div class="col-1"></div>
                <input type="submit" class="btn btn-primary col-4 rounded p-2" value="Sign up - it’s free!">
            </form>
            <a href="https://youtu.be/uE1KQ5EbGRw" target=”_blank” class="fs-6 text-neutral-10" id="watch">
                Watch the story 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                    <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                </svg>
            </a>
        </div>
        <div class="col-md-6 text-end">
            <img class="img-fluid h-100" src="{{URL::asset('img/dolpy_ads.png')}}">
        </div>
    </div>
</div>