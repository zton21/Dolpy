$(() => {  
    const pathname = window.location.pathname;
    if (pathname == '/faq') $('#SVGRepo_faq').addClass('faq_active');

    let items = document.querySelectorAll('.nav-link');
    let btn_pcs = document.querySelectorAll('.btndolpy');

    items.forEach(item => {
        if (item.classList.contains('dropdown-toggle') == false) {
            if (item.classList.contains('pnav')) {
                item.addEventListener("mouseover", () =>{
                    item.parentNode.classList.toggle("hoverproject");
                });
                item.addEventListener("mouseout", () =>{
                    item.parentNode.classList.toggle("hoverproject");
                });
            }
            item.addEventListener("mouseover", () =>{
                item.parentNode.classList.toggle("hover");
            });
            item.addEventListener("mouseout", () =>{
                item.parentNode.classList.toggle("hover");
            });
        }
    });
    btn_pcs.forEach(item => {
        console.log(item);
        if (item.classList.contains('dropdown-toggle') == false) {
            item.addEventListener("mouseover", () =>{
                item.classList.toggle("hoverbtn");
            });
            item.addEventListener("mouseout", () =>{
                item.classList.toggle("hoverbtn");
            });
        }
    });

    

});