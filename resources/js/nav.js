function moveSearchDonateContainer() {
    const toggle = document.querySelector(".navbar-toggler");
    const navbar = document.getElementById("navbarSupportedContent");
    const container = document.getElementById("search-donate-container");
    const element = document.querySelector("#search-donate-container");


    if (window.innerWidth <= 990) {
        // On small screens, insert the container before the navbar
        navbar.parentNode.insertBefore(container, toggle);
        element.style.opacity = 1;

    } else {
        // On large screens, insert the container after the navbar
        if (navbar.nextSibling) {
            navbar.parentNode.insertBefore(container,navbar.nextElementSibling);
            element.style.opacity = 1;
        } else {
            navbar.parentNode.appendChild(container);
            element.style.opacity = 1;
        }
    }
}

window.addEventListener("load", moveSearchDonateContainer);
window.addEventListener("resize", moveSearchDonateContainer);
