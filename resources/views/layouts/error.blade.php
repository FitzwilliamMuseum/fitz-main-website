@include('includes.structure.name-spaces')
<head>
    @include('includes.structure.meta')
    <x-feed-links></x-feed-links>
    @include('includes.css.css')
    @include('includes.structure.manifest')
    <script>
        // Include the following lines to define the gtag() function when
        // calling this code prior to your gtag.js or Tag Manager snippet
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        // Call the default command before gtag.js or Tag Manager runs to
        // adjust how the tags operate when they run. Modify the defaults
        // per your business requirements and prior consent granted/denied, e.g.:
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'ad_user_data': 'denied',
            'ad_personalization': 'denied',
            'analytics_storage': 'denied'
        });

    </script>
    @include('googletagmanager::head')

</head>
<body class="doc-body c_darkmode">
    @include('googletagmanager::body')
    @include('includes.structure.accessibility')
    @include('includes.structure.nav')
    @include('includes.structure.head')
    <main id="site-content">
        <div class="container">
            @yield('content')
        </div>
    </main>
    @include('includes.structure.footer')
    @include('includes.scripts.javascript')
    </body>
</html>
