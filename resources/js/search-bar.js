window.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('#search-btn');
    const searchBar = document.querySelector('#main-search');
    const menuToggle = document.querySelector('.navbar-toggler');
    const searchInput = searchBar.querySelector('input');

    const DESKTOP_BREAKPOINT = 992;
    const TOP_POSITION = {
        DEFAULT: '90px',
        EXPANDED: '470px'
    };

    /**
     * Updates search bar position only if input is not focused
     * @param {boolean} isMenuExpanded - Mobile menu expansion state
     */
    function updateSearchPosition(isMenuExpanded) {
        if (document.activeElement !== searchInput && !searchBar.hasAttribute('hidden')) {
            const isDesktop = window.innerWidth > DESKTOP_BREAKPOINT;
            searchBar.style.top = isDesktop ? TOP_POSITION.DEFAULT : 
                                 (isMenuExpanded ? TOP_POSITION.EXPANDED : TOP_POSITION.DEFAULT);
        }
    }

    const resizeObserver = new ResizeObserver(() => {
        if (document.activeElement !== searchInput) {
            const isMenuExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            updateSearchPosition(isMenuExpanded);
        }
    });
    
    resizeObserver.observe(document.body);

    searchButton.addEventListener('click', () => {
        searchBar.toggleAttribute('hidden');
        const isMenuExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        updateSearchPosition(isMenuExpanded);

        if (!searchBar.hasAttribute('hidden')) {
            searchInput.focus();
        }

    });

    menuToggle.addEventListener('click', () => {
        const isMenuExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        if (!searchBar.hasAttribute('hidden')) {
            searchBar.setAttribute('hidden', 'true');
        }
        updateSearchPosition(!isMenuExpanded);
    });
});