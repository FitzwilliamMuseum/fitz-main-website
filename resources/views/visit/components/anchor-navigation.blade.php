<nav class="anchor-navigation anchor-navigation--large">
    <div class="wrapper">
        <ul>
            @foreach($anchors as $anchor)
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
        <button id="anchor-nav-toggle"
        data-bs-toggle="collapse"
        data-bs-target="#anchor-navigation-list"
        aria-expanded="false"
        aria-controls="anchor-navigation-list">
            <span class="anchor-nav-toggle__text">Show</span>
        </button>
    </div>
    <ul class="collapse"
    id="anchor-navigation-list"
    aria-labelledby="anchor-navigation-heading"
    data-parent="anchorNavigation">
        @foreach($anchors as $anchor)
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
            if(navToggleText.innerHTML == 'Show') {
                navToggleText.innerHTML = 'Hide'
            } else {
                navToggleText.innerHTML = 'Show'
            }
        });
    </script>
@endPushOnce
