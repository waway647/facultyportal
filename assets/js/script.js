document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-links-container a");
    const navLinks2 = document.querySelectorAll(".nav-links-container-2 a");
   
    let currentUrl = window.location.href.split(/[?#]/)[0]; // Get the base URL without query params or fragments

    // Extract the section from the URL (e.g., "Account" from /faculty_controllers/Account/edit)
    const urlPathParts = currentUrl.split('/').filter(Boolean); // Split and remove empty parts
    let currentSection = '';
    if (urlPathParts.length > 2) { // Ensure we have enough parts (e.g., index.php, faculty_controllers, Account, etc.)
        // Look for the section after "faculty_controllers" (case-sensitive match)
        const controllersIndex = urlPathParts.indexOf('faculty_controllers');
        if (controllersIndex !== -1 && controllersIndex + 1 < urlPathParts.length) {
            currentSection = urlPathParts[controllersIndex + 1]; // Get the section (e.g., "Account")
        }
    }

    // Handle the first set of navigation links (e.g., top-level items like "Account", "Profile", etc.)
    navLinks.forEach((link) => {
        const divElement = link.querySelector(".nav-link");
        const textElement = link.querySelector(".text-wrapper-4");

        // Get the href of the link (e.g., /GitHub/facultyportal/index.php/faculty_controllers/Account/)
        const linkPath = link.href.split(/[?#]/)[0];
        const linkPathParts = linkPath.split('/').filter(Boolean);

        // Check if the link corresponds to the current section (case-sensitive)
        if (linkPathParts.length > 2) {
            const linkSection = linkPathParts[linkPathParts.indexOf('faculty_controllers') + 1] || '';
            if (currentSection && linkSection === currentSection) {
                if (divElement && textElement) {
                    divElement.classList.add("active");
                    textElement.classList.add("highlight");
                }
            }
        }
    });

    // Handle the second set of navigation links (navLinks2) — generalize similarly if needed
    navLinks2.forEach((link) => {
        const divElement = link.querySelector(".nav-link-3");
        const textElement = link.querySelector(".text-wrapper-5");
        const textElement1 = link.querySelector(".text-wrapper-6");
    
        // Get the href of the link for navLinks2
        const linkPath = link.href.split(/[?#]/)[0];
        const linkPathParts = linkPath.split('/').filter(Boolean);

        // Check if the link corresponds to the current section
        if (linkPathParts.length > 2) {
            const linkSection = linkPathParts[linkPathParts.indexOf('faculty_controllers') + 1] || '';
            if (currentSection && linkSection === currentSection) {
                if (divElement) divElement.classList.add("active");
                if (textElement) textElement.classList.add("highlight");
                if (textElement1) textElement1.classList.add("highlight");
            }
        }
    });   
    
});