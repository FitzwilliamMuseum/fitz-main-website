@section('title', 'Events')
@section('hero_image', env('CONTENT_STORE') . 'tnew-homepage.png')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'The Fitzwilliam Museum runs a rich programme of events')
@section('keywords', 'events,fitzwilliam')

@include('includes.structure.name-spaces')

<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @include('includes.structure.manifest')

    @yield('jsonld')

    <x-feed-links></x-feed-links>

    @include('googletagmanager::head')

</head>

<body class="doc-body c_darkmode support">

    @include('googletagmanager::body')

    @include('includes.structure.accessibility')

    @include('includes.structure.nav')

    @include('support.components.head', ['hero' => env('CONTENT_STORE') . 'tnew-homepage.png'])

    <div class="container-fluid related">
        <div class="container related-container">
            <div class="related-grid">
                @php
                    //use Illuminate\Support\Arr;
                    //$types = Arr::pluck($productions, 'FacilityDescription');
                    //$ids = Arr::pluck($productions, 'Facility');
                    //$tags = array_count_values($types);
                    usort($productions, function ($a, $b) {
                        return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
                    });
                @endphp
                @foreach ($events['data'] as $type)
                    @php
                        if(!empty($type['hero_image'])) {
                            $image = $type['hero_image'];
                        }
                        if(!empty($type['title'])) {
                            $altTag = $type['title'];
                            $title = $type['title'];
                        }
                        $route = 'events.type';
                        if(!empty($type['event_id'])) {
                            $params = [
                                'kid' => $type['event_id']
                            ];
                        }
                    @endphp
                    <div class="card card-fitz h-100">
                        @isset($image)
                            <a href="{{ route($route, $params) }}">
                                <img class="card-img-top"
                                    src="{{ $image['data']['thumbnails'][13]['url']}}"
                                    alt="{{ $altTag }}"
                                    width="{{ $image['data']['thumbnails'][13]['width']}}"
                                    height="{{ $image['data']['thumbnails'][13]['height']}}"
                                    loading="lazy"
                                />
                            </a>
                        @else
                            <a href="{{ route($route, $params) }}">
                                <img class="card-img-top"
                                    src="{{ env('MISSING_IMAGE_URL') }}"
                                    alt="A stand in image for {{ $title }}"
                                    loading="lazy"
                                />
                            </a>
                        @endisset
                        <div class="card-body h-100">
                            <div class="contents-label mb-3">
                                <h3 {{ Request::segment(1) === "learn-with-us" ? 'class=learning-heading' : '' }}>
                                    <a href="{{ route($route, $params) }}" class="stretched-link">
                                        {{ $title }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('includes.structure.email-signup')

    @include('includes.structure.footer')

    @include('includes.scripts.javascript')

</body>

</html>
