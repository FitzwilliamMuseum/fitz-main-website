<!DOCTYPE html>
<html lang="en" dir="ltr"
      prefix="content: https://purl.org/rss/1.0/modules/content/  dc: https://purl.org/dc/terms/  foaf: https://xmlns.com/foaf/0.1/  og: https://ogp.me/ns#  rdfs: https://www.w3.org/2000/01/rdf-schema#  schema: https://schema.org/  sioc: https://rdfs.org/sioc/ns#  sioct: https://rdfs.org/sioc/types#  skos: https://www.w3.org/2004/02/skos/core#  xsd: https://www.w3.org/2001/XMLSchema# ">
<head>
    @include('includes.structure.meta')
    <x-feed-links/>
    @include('includes.css.css')
    @include('includes.structure.manifest')
    @include('googletagmanager::head')
</head>
<body class="doc-body">
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
