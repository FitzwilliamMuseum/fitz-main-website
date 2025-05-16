window.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('#search-btn');
    const searchForm = document.querySelector('#main-search');
    const toggleButtons = document.querySelectorAll('[data-toggle="true"]');

    const closeDisclosures = () => {
        toggleButtons.forEach(btn => {
            if (btn.getAttribute('aria-expanded') === 'true') {
                btn.setAttribute('aria-expanded', 'false');
                const target = btn.previousElementSibling;
                if (target) {
                    target.removeAttribute('data-item-expanded');
                }
            }
        });
    };

    if (toggleButtons.length) {
        toggleButtons.forEach(btn => {
            btn.setAttribute('aria-expanded', 'false');
        });

        document.addEventListener('click', (event) => {
            if (event.target.matches('#search-btn') || event.target.closest('#search-btn')) {
                const isExpanded = searchButton.getAttribute('aria-expanded') === 'true';
                closeDisclosures();
                searchButton.setAttribute('aria-expanded', !isExpanded);
                searchForm.setAttribute('data-item-expanded', !isExpanded);
                if (!isExpanded) {
                    searchForm.querySelector('input').focus();
                }
                return;
            }

            if (!event.target.closest('#main-search') && !event.target.closest('#search-btn')) {
                searchButton.setAttribute('aria-expanded', 'false');
                searchForm.removeAttribute('data-item-expanded');
            }

            if (event.target.matches('[data-toggle="true"]')) {
                const toggleTarget = event.target.previousElementSibling;
                if (event.target.matches('[aria-expanded="false"]')) {
                    closeDisclosures();
                    event.target.setAttribute('aria-expanded', 'true');
                    toggleTarget?.setAttribute('data-item-expanded', 'true');
                } else {
                    event.target.setAttribute('aria-expanded', 'false');
                    toggleTarget?.removeAttribute('data-item-expanded');
                }
            }
        });

        document.addEventListener('keyup', ({ key, defaultPrevented }) => {
            if (defaultPrevented) return;

            if (key === 'Escape' || key === 'Esc') {
                closeDisclosures();
                searchButton.setAttribute('aria-expanded', 'false');
                searchForm.removeAttribute('data-item-expanded');
            }
        });
    }
});
