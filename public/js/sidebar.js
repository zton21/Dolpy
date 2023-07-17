$(() => {  
const toggle = document.querySelector(".toggle"),
        sidebar = document.querySelector('.sidebar');

let items = document.querySelectorAll('.nav-link');

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})

items.forEach(item => {
    item.addEventListener("click", () =>{
        item.classList.add("sdactive");
    });

    if(item.classList.contains('active')){
        
    }else{
        item.addEventListener("mouseover", () =>{
            item.classList.toggle("hover");
        });
        item.addEventListener("mouseout", () =>{
            item.classList.toggle("hover");
        });
    }
});

// function check(item){


// }
});