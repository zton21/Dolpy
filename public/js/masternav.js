$(() => {  
    let items = document.querySelectorAll('.nav-link');
    const pathname = window.location.pathname;
    console.log(pathname);
    
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
            item.addEventListener("mouseover", () =>{
                item.parentNode.classList.toggle("hover");
            });
            item.addEventListener("mouseout", () =>{
                item.parentNode.classList.toggle("hover");
                // item.classList.toggle("hover");
            });
        }
    });
});