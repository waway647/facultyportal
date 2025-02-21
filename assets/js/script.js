document.addEventListener("DOMContentLoaded", function () {

    const navLinks = document.querySelectorAll(".nav-links-container a");
    const navLinks2 = document.querySelectorAll(".nav-links-container-2 a");
   
    let currentUrl = window.location.href;

    navLinks.forEach((link)=>{
            const divElement = link.querySelector(".nav-link");
            const textElement = link.querySelector(".text-wrapper-4");

            if(link.href === currentUrl){
                if(divElement && textElement){
                    divElement.classList.add("active");
                    textElement.classList.add("highlight");
                }
            }
    });

    navLinks2.forEach((link)=>{
        const divElement = link.querySelector(".nav-link-3");
        const textElement = link.querySelector(".text-wrapper-4");

        if(link.href === currentUrl){
            if(divElement && textElement){
                divElement.classList.add("active");
                textElement.classList.add("highlight");
            }
        }
    });

});