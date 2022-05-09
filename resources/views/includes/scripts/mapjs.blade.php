<script>
    @if(Route::current()->getName() == 'visit')
    window.addEventListener('LaravelMaps:MapInitialized', function (event) {
        const geojsonFeature = {
            "type": "FeatureCollection",
            "features": [
                {
                    "type": "Feature",
                    "properties": {},
                    "geometry": {
                        "type": "LineString",
                        "coordinates": [
                            [
                                0.11966977268457411,
                                52.19974351311363
                            ],
                            [
                                0.11970698833465575,
                                52.1997184428033
                            ],
                            [
                                0.11962886899709702,
                                52.19967919335461
                            ],
                            [
                                0.11962182819843292,
                                52.19968556368636
                            ],
                            [
                                0.11947263032197951,
                                52.19960398227237
                            ],
                            [
                                0.1195242628455162,
                                52.19956760965412
                            ],
                            [
                                0.11947631835937499,
                                52.199542128254144
                            ],
                            [
                                0.11959902942180632,
                                52.19945212125659
                            ],
                            [
                                0.11955276131629942,
                                52.19942972222658
                            ],
                            [
                                0.11965837329626083,
                                52.1993580041555
                            ],
                            [
                                0.11962920427322386,
                                52.19934320843588
                            ],
                            [
                                0.11977672576904297,
                                52.199240254750556
                            ],
                            [
                                0.11994872242212296,
                                52.19933252263532
                            ],
                            [
                                0.12003321200609206,
                                52.19927231221109
                            ],
                            [
                                0.12005165219306946,
                                52.19927477816862
                            ],
                            [
                                0.1200415939092636,
                                52.19929409483133
                            ],
                            [
                                0.11998459696769716,
                                52.19933190614676
                            ],
                            [
                                0.12029271572828291,
                                52.19949589180557
                            ],
                            [
                                0.12029942125082016,
                                52.199489932437565
                            ],
                            [
                                0.12034133076667786,
                                52.199511920446504
                            ],
                            [
                                0.1203322783112526,
                                52.19951870179289
                            ],
                            [
                                0.12042012065649033,
                                52.19956534920795
                            ],
                            [
                                0.12040302157402039,
                                52.19957665143771
                            ],
                            [
                                0.12048147618770598,
                                52.19961302404854
                            ],
                            [
                                0.12031618505716324,
                                52.199729334005426
                            ],
                            [
                                0.12024208903312682,
                                52.199782557011396
                            ],
                            [
                                0.12024845927953719,
                                52.19978522843471
                            ],
                            [
                                0.1202353835105896,
                                52.199795297644286
                            ],
                            [
                                0.12024208903312682,
                                52.19979858554895
                            ],
                            [
                                0.12023672461509705,
                                52.19980310641746
                            ],
                            [
                                0.1202457770705223,
                                52.19980927123744
                            ],
                            [
                                0.12014552950859068,
                                52.19988263252953
                            ],
                            [
                                0.12013413012027739,
                                52.199877084200736
                            ],
                            [
                                0.12013044208288193,
                                52.19988098858033
                            ],
                            [
                                0.12011770159006119,
                                52.19987544025136
                            ],
                            [
                                0.12010898441076277,
                                52.19988263252953
                            ],
                            [
                                0.12005601078271866,
                                52.19985632933509
                            ],
                            [
                                0.12006606906652449,
                                52.199849548040255
                            ],
                            [
                                0.1200573518872261,
                                52.19984584915172
                            ],
                            [
                                0.12006606906652449,
                                52.19983927334914
                            ],
                            [
                                0.11994302272796631,
                                52.19977433724628
                            ],
                            [
                                0.11970363557338715,
                                52.199938732259426
                            ],
                            [
                                0.11979851871728897,
                                52.19998969459003
                            ],
                            [
                                0.11973414570093155,
                                52.20003777996127
                            ],
                            [
                                0.11973313987255096,
                                52.20004086235508
                            ],
                            [
                                0.11982668191194534,
                                52.20009018062712
                            ],
                            [
                                0.11985953897237778,
                                52.20006737093313
                            ],
                            [
                                0.11987831443548203,
                                52.20008011148437
                            ],
                            [
                                0.11988501995801927,
                                52.20007435768747
                            ],
                            [
                                0.11994838714599608,
                                52.200109702428
                            ],
                            [
                                0.11994201689958571,
                                52.200113812279746
                            ],
                            [
                                0.11996414512395859,
                                52.20012490887751
                            ],
                            [
                                0.1198994368314743,
                                52.20016806228693
                            ],
                            [
                                0.11988434940576552,
                                52.200157376684686
                            ],
                            [
                                0.11982031166553497,
                                52.2002023794921
                            ],
                            [
                                0.11985149234533309,
                                52.20021881886246
                            ],
                            [
                                0.11967815458774565,
                                52.20033779862407
                            ],
                            [
                                0.11961109936237335,
                                52.200384239688105
                            ],
                            [
                                0.11958058923482896,
                                52.20036800587035
                            ],
                            [
                                0.11951923370361328,
                                52.200411775517324
                            ],
                            [
                                0.11953700333833694,
                                52.200421844584945
                            ],
                            [
                                0.11947531253099442,
                                52.20046561417889
                            ],
                            [
                                0.11945553123950958,
                                52.2004549286482
                            ],
                            [
                                0.11944983154535294,
                                52.200458011013076
                            ],
                            [
                                0.11938612908124924,
                                52.20042348851412
                            ],
                            [
                                0.11939115822315216,
                                52.20041978967337
                            ],
                            [
                                0.11936902999877928,
                                52.20040766569314
                            ],
                            [
                                0.11940188705921172,
                                52.200381979283435
                            ],
                            [
                                0.11905621737241745,
                                52.200205256382354
                            ],
                            [
                                0.11927582323551178,
                                52.20005380840679
                            ],
                            [
                                0.11949073523283005,
                                52.19990564781191
                            ],
                            [
                                0.11953700333833694,
                                52.19993071801662
                            ],
                            [
                                0.11974956840276718,
                                52.19978420096421
                            ],
                            [
                                0.11966541409492493,
                                52.19974269113647
                            ]
                        ]
                    }
                }
            ]
        };

        const element = event.detail.element;
        const map = event.detail.map;
        L.geoJSON(geojsonFeature).addTo(map);
        map.scrollWheelZoom.disable();
    });
    @elseif(in_array(Route::current()->getName(), array('exhibition.ttn.label','exhibition.ttn.artist') ))
    window.addEventListener('LaravelMaps:MapInitialized', function (event) {
        const map = event.detail.map;

        const Stamen_Terrain = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 18,
            ext: 'png'
        });
        map.addLayer(Stamen_Terrain);

    });
    @elseif(Route::current()->getName() === 'exhibition.ttn.mapped')
    window.addEventListener('LaravelMaps:MapInitialized', function (event) {
        // load GeoJSON from an external file
        const map = event.detail.map;

        $.getJSON("{{route('exhibition.ttn.geoJson')}}", function (data) {
            // add GeoJSON layer to the map once the file is loaded
            L.geoJson(data).addTo(map);
        });
        const Stamen_Terrain = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 18,
            ext: 'png'
        });
        map.addLayer(Stamen_Terrain);
        map.scrollWheelZoom.disable();
    });

    @else
    window.addEventListener('LaravelMaps:MapInitialized', function (event) {
        const map = event.detail.map;
        map.scrollWheelZoom.disable();
    });
    @endif
</script>
