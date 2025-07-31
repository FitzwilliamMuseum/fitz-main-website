<nav aria-label="secondary navigation" class="anchor-navigation anchor-navigation--large">
    <div class="wrapper">
        <ul id="anchor-navigation-list-desktop">
            @foreach ($anchors as $anchor)
                <li>
                    <a href="#{{ $anchor['anchor_id'] }}">{{ $anchor['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<nav aria-label="secondary navigation" class="anchor-navigation anchor-navigation--small" id="anchorNavigation">
    <div class="anchor-navigation__header">
        <h2 id="anchor-navigation-heading">On this page</h2>    
        <button id="anchor-nav-toggle" data-bs-toggle="collapse" data-bs-target="#anchor-navigation-list-mobile"
            aria-expanded="false" aria-controls="anchor-navigation-list-mobile">
            <span class="anchor-nav-toggle__text">Show</span>
        </button>
    </div>
    <ul class="collapse" id="anchor-navigation-list-mobile" aria-labelledby="anchor-navigation-heading"
        data-parent="anchorNavigation">
        @foreach ($anchors as $anchor)
            <li>
                <a href="#{{ $anchor['anchor_id'] }}">{{ $anchor['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
@pushOnce('fitzwilliamScripts')
    <script defer type="text/javascript">
        let navToggle = document.getElementById('anchor-nav-toggle');
        let navToggleText = document.querySelector('.anchor-nav-toggle__text');
        navToggle.addEventListener('click', function(e) {
            if (navToggleText.innerHTML == 'Show') {
                navToggleText.innerHTML = 'Hide'
            } else {
                navToggleText.innerHTML = 'Show'
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const navLinksMobile = document.querySelectorAll('#anchor-navigation-list-mobile a');
            const navLinksDesktop = document.querySelectorAll('#anchor-navigation-list-desktop a');
            const allNavLinks = [...navLinksMobile, ...navLinksDesktop];

            const idToLinks = {};
            allNavLinks.forEach(link => {
                const id = link.getAttribute('href').replace('#', '');
                if (!idToLinks[id]) idToLinks[id] = [];
                idToLinks[id].push(link);
            });

            const sections = Object.keys(idToLinks)
                .map(id => document.getElementById(id))
                .filter(Boolean);

            function getStickyNavHeight() {
                const navLarge = document.querySelector('.anchor-navigation--large');
                const navSmall = document.querySelector('.anchor-navigation--small');
                let nav = null;
                if (window.innerWidth >= 992 && navLarge && navLarge.offsetHeight > 0) {
                    nav = navLarge;
                } else if (navSmall && navSmall.offsetHeight > 0) {
                    nav = navSmall;
                }
                return nav ? nav.offsetHeight : 0;
            }

            function highlightClosestSection() {
                const navHeight = getStickyNavHeight();
                let minDist = Infinity;
                let closestId = null;
                sections.forEach(section => {
                    const dist = Math.abs(section.getBoundingClientRect().top - navHeight);
                    if (dist < minDist) {
                        minDist = dist;
                        closestId = section.id;
                    }
                });
                if (closestId) {
                    Object.values(idToLinks).forEach(links => links.forEach(l => l.classList.remove('active')));
                    idToLinks[closestId].forEach(l => l.classList.add('active'));
                }
            }

            window.addEventListener('scroll', highlightClosestSection);
            window.addEventListener('resize', highlightClosestSection);
            highlightClosestSection();

            allNavLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href').replace('#', '');
                    const targetElement = document.getElementById(targetId);

                    const navToggle = document.getElementById('anchor-nav-toggle');
                    const navList = document.getElementById('anchor-navigation-list-mobile');
                    const navToggleText = document.querySelector('.anchor-nav-toggle__text');
                    const isMobile = window.innerWidth < 992;

                    function scrollWithOffset(element) {
                        const offset = getStickyNavHeight();
                        const y = element.getBoundingClientRect().top + window.pageYOffset - offset;
                        window.scrollTo({
                            top: y,
                            behavior: 'smooth'
                        });
                    }

                    Object.values(idToLinks).forEach(links => links.forEach(l => l.classList.remove(
                        'active')));
                    if (idToLinks[targetId]) {
                        idToLinks[targetId].forEach(l => l.classList.add('active'));
                    } else {
                        this.classList.add('active');
                    }

                    if (targetElement) {
                        e.preventDefault();
                        scrollWithOffset(targetElement);
                    }

                    if (isMobile && navToggle && navList.classList.contains('show')) {
                        navToggle.setAttribute('aria-expanded', 'false');
                        navToggle.classList.add('collapsed');
                        if (navToggleText) navToggleText.innerHTML = 'Show';
                        if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                            bootstrap.Collapse.getOrCreateInstance(navList).hide();
                        } else {
                            navList.classList.remove('show');
                        }
                    }
                });
            });
        });
    </script>
@endPushOnce
