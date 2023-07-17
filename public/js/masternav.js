$(() => {  
    let items = document.querySelectorAll('.nav-link');
    let btn_pcs = document.querySelectorAll('.btndolpy');
    const pathname = window.location.pathname;

    let notif = document.querySelector('#SVGRepo_notif');
    notif.addEventListener("click", () =>{
        notif.classList.toggle("notif_nactive");
    });

    if (pathname == '/faq') {
        let icon = document.querySelector('#SVGRepo_faq');
        icon.classList.add('faq_active')
    }

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
            // item.addEventListener("mouseout", () =>{
            //     item.parentNode.classList.toggle("hover");
            // });
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