@if(!empty($hero))
    <div class="container-fluid">
        <div class="row">
            <div class="{{$hero['exhibition_link'] ? 'col-md-8' : ''}}">
                @if($hero['hero_title'])
                    <h1>{{ $hero['hero_title'] }}</h1>
                @else
                    <h1>{{ title }}</h1>
                @endif
                @if($hero['hero_title'])
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
            @if($hero['exhibition_link'])
                <div class="col-md-4 mt-auto">
                    <a href="{{ route('exhibition', $hero['exhibition_link']['slug']) }}">{{ $hero['exhibition_link_text'] }}</a>
                </div>
            @endif
        </div>
        @if($hero['hero_image'])
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
@endif --}}

<div class="head parallax">
    <div class="bg-overlay"></div>
    <div class="addon">
        <div class="wrapper">
            <h1>asdf</h1>
            <p>asdasd</p>
            <p>asdasdadsads — asddasadsdasdsadsa</p>
        </div>
        <button>Book free tickets now</button>
    </div>
</div>

<style>
    .head {
        background-image: url('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/b-walker-for-exhib-webpage-1.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 30%;
        display: flex;
        isolation: isolate;
        z-index: 100;
        position: relative;
    }

    .parallax {
        min-height: 83vh;
    }

    .parallax-home {
        min-height: 0;
        height: 280px;
    }

    .bg-overlay {
        background-image: linear-gradient(to top, rgba(0, 0, 0, .8) 10%, transparent);
        width: 100%;
        height: 100%;
        position: absolute;
    }

    .addon {
        max-width: 1320px;
        padding: 0 16px 72px 16px;
        margin: 0 auto;
        width: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        color: white;
        position: relative;
        gap: 180px;
        z-index: 101;

        @media (max-width: 768px) {
            gap: 20px;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-end;
        }
    }

    .wrapper {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .wrapper h1 {
        color: #FFF;
        font-size: 80px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .wrapper p {
        font-size: 24px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .wrapper p:last-of-type {
        margin-bottom: 0;
    }

    button {
        white-space: nowrap;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        display: flex;
        padding: 16px;
        justify-content: flex-end;
        align-items: flex-start;
        background: white;
        color: #000;
        border: none;
        border-radius: 4px;
    }

    .container-home-cards {
        padding: 20px 16px 30px 16px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: max-content 1fr;
        grid-gap: 18px;
        grid-auto-columns: 33.3333%;
    }

    .container-home-card {
        width: 100%;
    }

    h3 {
        grid-row: 1 / 2;
        grid-column: 1 / -1;
    }

    .row-home {
        grid-row: 2 / 3;
        grid-column: 1 / -1;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        grid-gap: 10px;
    }

    .card-image {
        position: relative;
        padding-top: 56.25%;
    }

    .card-image img {
        position: absolute;
        top: 0px;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
