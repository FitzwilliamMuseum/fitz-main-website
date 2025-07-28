<nav class="anchor-navigation anchor-navigation--large">
    <div class="wrapper">
        <ul id="anchor-navigation-list">
            @foreach ($anchors as $anchor)
                <li>
                    <a href="#{{ $anchor['anchor_id'] }}">{{ $anchor['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<nav class="anchor-navigation anchor-navigation--small" id="anchorNavigation">
    <div class="anchor-navigation__header">
        <h3 id="anchor-navigation-heading">On this page</h3>
        <button id="anchor-nav-toggle" data-bs-toggle="collapse" data-bs-target="#anchor-navigation-list"
            aria-expanded="false" aria-controls="anchor-navigation-list">
            <span class="anchor-nav-toggle__text">Show</span>
        </button>
    </div>
    <ul class="collapse" id="anchor-navigation-list" aria-labelledby="anchor-navigation-heading"
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
            const navLinks = document.querySelectorAll('#anchor-navigation-list a');
            const secondNav = document.querySelector('.anchor-navigation.anchor-navigation--large');
            const navLinks2 = secondNav ? secondNav.querySelectorAll('#anchor-navigation-list a') : [];
            const allNavLinks = [...navLinks, ...navLinks2];


            const idToLinks = {};
            allNavLinks.forEach(link => {
                const id = link.getAttribute('href').replace('#', '');
                if (!idToLinks[id]) idToLinks[id] = [];
                idToLinks[id].push(link);
            });

            const sections = Object.keys(idToLinks)
                .map(id => document.getElementById(id))
                .filter(Boolean);

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.7,
            };

            function observerCallback(entries, observer) {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        Object.values(idToLinks).forEach(links => links.forEach(l => l.classList.remove(
                            'active')));
                        idToLinks[entry.target.id].forEach(l => l.classList.add('active'));
                    }
                });
            }

            const observer = new IntersectionObserver(observerCallback, observerOptions);
            sections.forEach((sec) => observer.observe(sec));

            allNavLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    allNavLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });


            });
        });
    </script>
@endPushOnce
