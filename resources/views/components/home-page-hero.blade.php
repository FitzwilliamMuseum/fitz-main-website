@if(!empty($hero))
    <div class="container-fluid">
        <div class="row">
            <div class="{{$hero['exhibition_link'] ? 'col-md-8' : ''}}">
                @if(!empty($hero['hero_title']))
                    <h1>{{ $hero['hero_title'] }}</h1>
                @else
                    <h1>{{ title }}</h1>
                @endif
                @if(!empty($hero['hero_title']))
                    <h2>
                        {{ $hero['hero_subtitle'] }}
                    </h2>
                @endif
                @if($hero['exhibition_link'])
                    <p>
                        <time datetime="{{ $hero['exhibition_link']['exhibition_start_date'] }}">{{ date('l dS F o', strtotime($hero['exhibition_link']['exhibition_start_date'])) }}</time>
                        - 
                        <time datetime="{{ $hero['exhibition_link']['exhibition_end_date'] }}">{{ date('l dS F o', strtotime($hero['exhibition_link']['exhibition_end_date'])) }}</time>
                    </p>
                @endif
            </div>
            @if(!empty($hero['exhibition_link']))
                <div class="col-md-4 mt-auto">
                    <a href="{{ route('exhibition', $hero['exhibition_link']['slug']) }}">{{ $hero['exhibition_link_text'] }}</a>
                </div>
            @endif
        </div>
        @if(!empty($hero['hero_image']))
            <picture>
                @foreach($hero['hero_image']['data']['thumbnails'] as $image)
                    @if ($image['key'] == 'mural-tablet')
                        <source media="(max-width: 768px)" srcset="{{ $image['url'] }}" width="{{ $image['width'] }}" height="{{ $image['height'] }}">
                    @elseif ($image['key'] == 'mural-phone')
                        <source media="(max-width: 574px)" srcset="{{ $image['url'] }}" width="{{ $image['width'] }}" height="{{ $image['height'] }}">
                    @endif
                @endforeach
                <img src="{{ $hero['hero_image']['data']['full_url'] }}" alt="{{ $hero['hero_image_alt_text'] }}">
            </picture>
        @endif
    </div>
@endif