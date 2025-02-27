window.addEventListener("DOMContentLoaded", () => {
    const search_button = document.querySelector("#search-btn");
    const main_search = document.querySelector("#main-search");
    const main_navbar = document.querySelector("nav.navbar");
    const navbar_toggler = document.querySelector(".navbar-toggler");

    function updateSearchPosition() {
        const navbarHeight = main_navbar.getBoundingClientRect().height;
        main_search.style.top = navbarHeight + "px";
    }

    search_button.addEventListener("click", () => {
        if (main_search.hasAttribute("hidden")) {
            main_search.removeAttribute("hidden");
            updateSearchPosition();
        } else {
            main_search.setAttribute("hidden", "true");
        }
    });

    navbar_toggler.addEventListener("click", () => {
        if (!main_search.hasAttribute("hidden")) {
            main_search.setAttribute("hidden", "true");
        }
    });

    window.addEventListener("resize", updateSearchPosition);
});