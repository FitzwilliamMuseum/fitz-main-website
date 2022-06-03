@include('includes.structure.name-spaces')
<head>
    @include('includes.structure.meta')
    <x-feed-links></x-feed-links>
    @include('includes.css.css')
    @include('includes.structure.manifest')
    @include('googletagmanager::head')
</head>
<body class="doc-body c_darkmode">
    @include('googletagmanager::body')
    @include('includes.structure.accessibility')
    @include('includes.structure.nav')
    @include('includes.structure.head')
    <div class="container">
        @yield('content')
    </div>
    @include('includes.structure.footer')
    @include('includes.scripts.javascript')
    </body>
</html>
