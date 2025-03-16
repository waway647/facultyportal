document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-links-container a");
    const navLinks2 = document.querySelectorAll(".nav-links-container-2 a");

    let currentUrl = window.location.href.split(/[?#]/)[0];
    currentUrl = currentUrl.replace(/\/(index|edit|view|update|delete)?$/, '');
    console.log("Normalized Current URL:", currentUrl);

    document.querySelectorAll(".nav-link, .nav-link-3").forEach(el => {
        el.classList.remove("active");
        el.style.backgroundColor = ""; // Reset inline styles
        el.style.boxShadow = "";
        console.log("Removed 'active' and inline styles from:", el);
    });

    navLinks.forEach((link) => {
        const divElement = link.querySelector(".nav-link");
        const textElement = link.querySelector(".text-wrapper-4");
        let linkPath = link.href.split(/[?#]/)[0];
        linkPath = linkPath.replace(/\/(index|edit|view|update|delete)?$/, '');
        console.log("Nav Link:", link);
        console.log("Normalized Link Path:", linkPath);
        console.log("Div Element (.nav-link):", divElement);
        console.log("Text Element (.text-wrapper-4):", textElement);

        if (currentUrl === linkPath) {
            console.log("Match Found for Link:", linkPath);
            if (divElement) {
                setTimeout(() => {
                    divElement.classList.add("active");
                    // Force apply styles
                    divElement.style.backgroundColor = "#e53b43";
                    divElement.style.boxShadow = "4px 6px 10px rgba(134, 18, 18, 0.359)";
                    console.log("Applied 'active' and inline styles to .nav-link:", divElement);
                    console.log("After adding 'active':", divElement.classList);
                    const computedStyle = window.getComputedStyle(divElement);
                    console.log("Computed background-color for .nav-link:", computedStyle.backgroundColor);
                    console.log("Computed box-shadow for .nav-link:", computedStyle.boxShadow);
                }, 200);
            }
            if (textElement) {
                textElement.classList.remove("highlight");
                textElement.classList.add("highlight");
                console.log("Applied 'highlight' to .text-wrapper-4:", textElement);
                console.log("After adding 'highlight':", textElement.classList);
            }
        }
    });

    navLinks2.forEach((link) => {
        const divElement = link.querySelector(".nav-link-3");
        const textElement = link.querySelector(".text-wrapper-5");
        const textElement1 = link.querySelector(".text-wrapper-6");
        let linkPath = link.href.split(/[?#]/)[0];
        linkPath = linkPath.replace(/\/(index|edit|view|update|delete)?$/, '');
        console.log("Nav Link 2:", link);
        console.log("Normalized Link Path (navLinks2):", linkPath);
        console.log("Div Element (.nav-link-3):", divElement);
        console.log("Text Element (.text-wrapper-5):", textElement);
        console.log("Text Element 1 (.text-wrapper-6):", textElement1);

        if (currentUrl === linkPath) {
            console.log("Match Found for Link (navLinks2):", linkPath);
            if (divElement) {
                setTimeout(() => {
                    divElement.classList.add("active");
                    divElement.style.backgroundColor = "#e53b43";
                    divElement.style.boxShadow = "4px 6px 10px rgba(134, 18, 18, 0.359)";
                    console.log("Applied 'active' and inline styles to .nav-link-3:", divElement);
                    console.log("After adding 'active':", divElement.classList);
                }, 200);
            }
            if (textElement) {
                textElement.classList.add("highlight");
                console.log("Applied 'highlight' to .text-wrapper-5:", textElement);
            }
            if (textElement1) {
                textElement1.classList.add("highlight");
                console.log("Applied 'highlight' to .text-wrapper-6:", textElement1);
            }
        }
    });
});