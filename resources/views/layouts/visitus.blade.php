<!DOCTYPE html>
<html lang="en" dir="ltr"
      prefix="content: https://purl.org/rss/1.0/modules/content/  dc: https://purl.org/dc/terms/  foaf: https://xmlns.com/foaf/0.1/  og: https://ogp.me/ns#  rdfs: https://www.w3.org/2000/01/rdf-schema#  schema: https://schema.org/  sioc: https://rdfs.org/sioc/ns#  sioct: https://rdfs.org/sioc/types#  skos: https://www.w3.org/2004/02/skos/core#  xsd: https://www.w3.org/2001/XMLSchema# ">
    <head>

        @include('includes.structure.meta')
        <x-feed-links/>

        @include('includes.css.css')

        @mapstyles

        @include('includes.structure.manifest')
        @include('googletagmanager::head')

    </head>
    <body class="doc-body">
        @include('googletagmanager::body')
        @include('includes.structure.accessibility')
        @include('includes.structure.nav')
        @include('includes.structure.head')
        @include('includes.structure.open')

        <div class="container mt-3">
            @include('includes.structure.breadcrumb')
        </div>

        @include('includes.elements.book')

        <div class="container-fluid py-3 bg-dark">
            @yield('content')
        </div>


        <div class="container py-2">
            <h3>
                Find us
            </h3>
        </div>

        <div class="container map-box ">
            @yield('map')
        </div>

        @include('includes.elements.directions')

        <div class="container mt-2">
            <h3>Floorplans and guides</h3>
            <div class="col-md-12 mb-2">
                <div class="mb-3 text-center">
                    @yield('floorplans')
                </div>
            </div>
        </div>
        @yield('associated_pages')
        @include('includes.structure.email-signup')
        @include('includes.structure.footer')
        @include('includes.scripts.javascript')

    </body>
</html>
