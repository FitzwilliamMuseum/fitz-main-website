    window.addEventListener("DOMContentLoaded", () => {
        const search_button = document.querySelector("#search-btn");
        const main_search = document.querySelector("#main-search");
        const main_navbar = document.querySelector("nav.navbar");
        const head = document.querySelector(".head.parallax");
        const navbar_toggler = document.querySelector(".navbar-toggler");

        function updateMargins() {
            const navbarHeight = main_navbar.getBoundingClientRect().height;
            const searchHeight = main_search.getBoundingClientRect().height;

            main_search.style.top = navbarHeight + "px";
            head.style.setProperty("margin-top", (searchHeight + navbarHeight) + "px", "important");

            if (navbar_toggler.classList.contains("show")) {
                main_search.style.top = navbarHeight + "px";
                main_search.style.minHeight = "0px";
                main_search.style.padding = "40px 16px 60px 16px";
                head.style.setProperty("margin-top", "0", "important");
            }
        }

        search_button.addEventListener("click", () => {
            if (main_search.hasAttribute("hidden")) {
                main_search.removeAttribute("hidden");
                updateMargins();
            } else {
                main_search.setAttribute("hidden", "true");
                head.style.setProperty("margin-top", 0);
                main_search.style.setProperty("top", 0);
            }
        });

        navbar_toggler.addEventListener("click", () => {
            if (main_search.hasAttribute("hidden")) {
                const navbarHeight = main_navbar.getBoundingClientRect().height;
                main_search.removeAttribute("hidden");
                main_search.style.top = (navbarHeight) + "px";
                main_search.style.minHeight = 0;
                main_search.style.padding = "0 16px 40px 16px";
                head.style.setProperty("margin-top", (navbarHeight) + "px", "important");
            } else {
                main_search.setAttribute("hidden", "true");
                head.style.setProperty("margin-top", 0);
            }
        });

        window.addEventListener("resize", updateMargins);
    });
