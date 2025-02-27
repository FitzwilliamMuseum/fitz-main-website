window.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('#search-btn');
    const searchBar = document.querySelector('#main-search');
    const menuToggle = document.querySelector('.navbar-toggler');

    const DESKTOP_BREAKPOINT = 992;
    const TOP_POSITION = {
        DEFAULT: '90px',
        EXPANDED: '470px'
    };

    /**
     * Updates search bar position based on menu state and viewport width
     * @param {boolean} isMenuExpanded - Mobile menu expansion state
     */
    function updateSearchPosition(isMenuExpanded) {
        if (!searchBar.hasAttribute('hidden')) {
            const isDesktop = window.innerWidth > DESKTOP_BREAKPOINT;
            searchBar.style.top = isDesktop ? TOP_POSITION.DEFAULT : (isMenuExpanded ? TOP_POSITION.EXPANDED : TOP_POSITION.DEFAULT);
        }
    }

    // Initialize resize observer for responsive layout
    const resizeObserver = new ResizeObserver(() => {
        const isMenuExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        updateSearchPosition(isMenuExpanded);
    });
    
    resizeObserver.observe(document.body);

    searchButton.addEventListener('click', () => {
        searchBar.toggleAttribute('hidden');
        const isMenuExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        updateSearchPosition(isMenuExpanded);
    });

    menuToggle.addEventListener('click', () => {
        const isMenuExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        
        // Hide search bar when menu is toggled
        if (!searchBar.hasAttribute('hidden')) {
            searchBar.setAttribute('hidden', 'true');
        }

        updateSearchPosition(!isMenuExpanded);
    });
});