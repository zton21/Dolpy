<style>
#header .background {
    top: calc(90% - 200vw);
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
    <svg viewBox="0 0 1443 2980" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 2979.5V0H1443V2828.75C1443 2828.75 1242.56 2925.42 1073 2909.5C903.441 2893.58 696.241 2828.75 414.644 2867.5C133.046 2906.25 0 2979.5 0 2979.5Z" fill="url(#paint0_linear_345_314)"/>
    <defs>
    <linearGradient id="paint0_linear_345_314" x1="89.531" y1="2919.52" x2="1305.23" y2="2339.75" gradientUnits="userSpaceOnUse">
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