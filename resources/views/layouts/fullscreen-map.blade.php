<!DOCTYPE html>
<html lang="en" dir="ltr"
      prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>
    @include('googletagmanager::head')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.css" rel="stylesheet">
    <style>
        html, body, #map {
            height: 100%;
            width: 100%;
            padding: 0px;
            margin: 0px;
        }
    </style>
</head>
<body class="doc-body">
@include('googletagmanager::body')
@yield('content')
@hasSection('map')
    @yield('map')

@endif
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.js"></script>


<script>
    var map = new L.Map('map', {
        center: new L.LatLng(43.8135614,4.3232393),
        zoom: 5,
        minZoom: 5,
        maxZoom: 11
    });
    $.getJSON("/visit-us/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/labels/geojson", function (data) {
        // add GeoJSON layer to the map once the file is loaded
        L.geoJson(data, {
            onEachFeature: onEachFeature,
            pointToLayer: createCircleMarker
        }).addTo(map);

    });

    function createCircleMarker( feature, latlng ){
        // Change the values of these options to change the symbol's appearance
        let options = {
            radius: 8,
            fillColor: "#8695be",
            color: "purple",
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8
        }
        return L.circleMarker( latlng, options );
    }

    function onEachFeature(feature, layer) {

        layer.bindPopup(
            feature.properties.title + "<br>" +  feature.properties.artist
            + "<br>" +
            "<a href='/visit-us/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/label/"
            + feature.properties.slug  + "'>" +
            "<img src='" + feature.properties.image + "'/>"
            + "</a>"
            , {
                maxWidth: "auto"
            }
        );
    }

    var Stamen_TerrainBackground = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain-background/{z}/{x}/{y}{r}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        minZoom: 0,
        maxZoom: 18,
        ext: 'png'
    });
    map.on('popupopen', function(e) {
        // find the pixel location on the map where the popup anchor is
        var px = map.project(e.popup._latlng);
        // find the height of the popup container, divide by 2 to centre, subtract from the Y axis of marker location
        px.y -= e.popup._container.clientHeight/2;
        // pan to new center
        map.panTo(map.unproject(px),{animate: true});
    });
    map.addLayer(Stamen_TerrainBackground);
    map.scrollWheelZoom.disable();
</script>
</body>

</html>
