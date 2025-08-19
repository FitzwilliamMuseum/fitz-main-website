window.addEventListener('DOMContentLoaded', () => {
    const searchForm = document.querySelector('#main-search');
    const searchButton = document.querySelector('#search-btn');
    const toggleButtons = document.querySelectorAll('[data-toggle="true"]');
    
    // An array to keep track of all expandable elements
    const expandableElements = [
        {
            button: searchButton,
            target: searchForm,
            isSearch: true
        }
    ];

    toggleButtons.forEach(btn => {
        const toggleTarget = btn.previousElementSibling;
        if (toggleTarget) {
            expandableElements.push({
                button: btn,
                target: toggleTarget,
                isSearch: false
            });
        }
    });

    // Function to close all disclosures
    const closeAll = () => {
        expandableElements.forEach(item => {
            item.button.setAttribute('aria-expanded', 'false');
            item.target.removeAttribute('data-item-expanded');
        });
    };

    // Initialize state
    expandableElements.forEach(item => {
        item.button.setAttribute('aria-expanded', 'false');
        item.target.removeAttribute('data-item-expanded');
    });

    document.addEventListener('click', (event) => {
        const clickedButton = event.target.closest('[data-toggle="true"]') || event.target.closest('#search-btn');
        const clickedInsideContainer = event.target.closest('[data-item-expanded]');

        if (clickedButton) {
            const isExpanded = clickedButton.getAttribute('aria-expanded') === 'true';

            // Close all other disclosures
            closeAll();

            // Toggle the clicked button's state
            clickedButton.setAttribute('aria-expanded', !isExpanded);

            // Find the corresponding target and toggle its state
            const item = expandableElements.find(el => el.button === clickedButton);
            if (item) {
                if (!isExpanded) {
                    item.target.setAttribute('data-item-expanded', 'true');
                    if (item.isSearch) {
                        item.target.querySelector('input').focus();
                    }
                }
            }
        } else if (!clickedInsideContainer) {
            // Close all disclosures if the click is outside all of them
            closeAll();
        }
    });

    document.addEventListener('keyup', (event) => {
        if (event.key === 'Escape') {
            closeAll();
        }
    });
});