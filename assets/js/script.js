document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-links-container a");
    const navLinks2 = document.querySelectorAll(".nav-links-container-2 a");

    // Browser detection
    const isEdge = /Edge|Edg\//.test(navigator.userAgent);
    const isOpera = !!window.opr || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    console.log("Browser is Edge:", isEdge);
    console.log("Browser is Opera:", isOpera);
    console.log("Full User Agent:", navigator.userAgent);

    // Get the current URL without query params or fragments
    let currentUrl = window.location.href.split(/[?#]/)[0];
    currentUrl = currentUrl.replace(/\/(index|edit|view|update|delete)?$/, '');
    console.log("Normalized Current URL:", currentUrl);

    // Remove 'active' class and reset styles from all nav-links
    document.querySelectorAll(".nav-link, .nav-link-3").forEach(el => {
        el.classList.remove("active");
        el.style.backgroundColor = "";
        el.style.boxShadow = "";
        console.log("Cleared 'active' and inline styles from:", el);
    });

    // Handle the first set of navigation links (navLinks)
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
                const delay = isEdge ? 1000 : 200; // Increased delay for Edge
                setTimeout(() => {
                    try {
                        divElement.classList.add("active");
                        // Force inline styles as fallback for Edge
                        if (isEdge) {
                            divElement.style.backgroundColor = "#e53b43";
                            divElement.style.boxShadow = "4px 6px 10px rgba(134, 18, 18, 0.359)";
                        }
                        console.log("Applied 'active' to .nav-link:", divElement);
                        console.log("After adding 'active':", divElement.classList);
                        const computedStyle = window.getComputedStyle(divElement);
                        console.log("Computed background-color for .nav-link:", computedStyle.backgroundColor);
                        console.log("Computed box-shadow for .nav-link:", computedStyle.boxShadow);
                        console.log("Inline background-color:", divElement.style.backgroundColor);
                        console.log("Inline box-shadow:", divElement.style.boxShadow);
                    } catch (error) {
                        console.error("Error adding 'active' class:", error);
                    }
                }, delay);
            } else {
                console.error("Div Element (.nav-link) not found for link:", link);
            }
            if (textElement) {
                textElement.classList.remove("highlight");
                textElement.classList.add("highlight");
                console.log("Applied 'highlight' to .text-wrapper-4:", textElement);
                console.log("After adding 'highlight':", textElement.classList);
                const computedStyle = window.getComputedStyle(textElement);
                console.log("Computed opacity for .text-wrapper-4:", computedStyle.opacity);
            } else {
                console.error("Text Element (.text-wrapper-4) not found for link:", link);
            }
        } else {
            console.log("No match for Link:", linkPath);
        }
    });

    // Handle the second set of navigation links (navLinks2)
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
                const delay = isEdge ? 1000 : 200;
                setTimeout(() => {
                    try {
                        divElement.classList.add("active");
                        if (isEdge) {
                            divElement.style.backgroundColor = "#e53b43";
                            divElement.style.boxShadow = "4px 6px 10px rgba(134, 18, 18, 0.359)";
                        }
                        console.log("Applied 'active' to .nav-link-3:", divElement);
                        console.log("After adding 'active':", divElement.classList);
                        const computedStyle = window.getComputedStyle(divElement);
                        console.log("Computed background-color for .nav-link-3:", computedStyle.backgroundColor);
                        console.log("Computed box-shadow for .nav-link-3:", computedStyle.boxShadow);
                    } catch (error) {
                        console.error("Error adding 'active' class:", error);
                    }
                }, delay);
            }
            if (textElement) {
                textElement.classList.add("highlight");
                console.log("Applied 'highlight' to .text-wrapper-5:", textElement);
                console.log("After adding 'highlight':", textElement.classList);
            }
            if (textElement1) {
                textElement1.classList.add("highlight");
                console.log("Applied 'highlight' to .text-wrapper-6:", textElement1);
                console.log("After adding 'highlight':", textElement1.classList);
            }
        }
    });

    // Monitor for class changes
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === "class") {
                console.log("Class change detected on:", mutation.target);
                console.log("New class list:", mutation.target.classList);
                console.log("Old class list:", mutation.oldValue);
            }
        });
    });
    document.querySelectorAll(".nav-link, .nav-link-3").forEach(el => {
        observer.observe(el, { attributes: true, attributeOldValue: true });
    });
});