<?php 

/*
    TODO: Create Directus fields for:
        hero_subtitle
        event_start_date
        event_end_date
        button_link
        button_text
*/

?>
@if(!empty($hero))
    <div class="container-fluid">
        <div>
            @if($hero['hero_title'])
                <h1>{{ $hero['hero_title'] }}</h1>
            @else
                <h1>{{ title }}</h1>
            @endif
            <h2>
                {{-- {{ $hero['hero_subtitle'] }} --}}
            </h2>
            <p>
                {{-- <time datetime="{{ $hero['event_start_date'] }}"></time> --}}
                 - 
                 {{-- <time datetime="{{ $hero['event_end_date'] }}"> --}}
            </p>
        </div>
        <div>
            <button>
                {{-- <a href="{{ $hero['button_link'] }}">{{ $hero['button_text'] }}</a> --}}
            </button>
        </div>
    </div>
@endif