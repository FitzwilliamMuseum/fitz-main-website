@php

    if(isset($exhibition)) {
        $quote_colour = 'green';
    } else {
        $quote_colour = 'sky';
    }
@endphp
<div class="component quote-component">
    <div class="container mx-auto col-max-800">
        <div class="quote-body quote-body--{{ $quote_colour }}" style="background-color: {{ $quote_colour === 'green' ? '#D6E4B4' : '#C4F1F5' }};">
            <div class="quote__image">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 60" preserveAspectRatio="xMidYMid meet" fill="none"><path fill="#000" d="M18.064 59.5c-5.33 0-9.653-1.873-12.967-5.619-3.17-3.89-4.754-8.933-4.754-15.128 0-8.069 2.377-15.56 7.132-22.477C12.229 9.216 18.136 3.958 25.196.5l1.297 2.593c-3.026 2.306-5.691 5.26-7.996 8.861-2.306 3.602-3.963 8.069-4.971 13.4l4.538 1.08c5.043 1.153 8.933 3.314 11.67 6.484 2.882 3.025 4.323 6.7 4.323 11.022 0 4.61-1.585 8.356-4.755 11.238-3.025 2.881-6.771 4.322-11.238 4.322Zm45.601 0c-5.33 0-9.653-1.873-12.967-5.619-3.17-3.89-4.755-8.933-4.755-15.128 0-8.069 2.378-15.56 7.132-22.477C57.83 9.216 63.737 3.958 70.797.5l1.297 2.593c-3.026 2.306-5.691 5.26-7.997 8.861-2.305 3.602-3.962 8.069-4.97 13.4l4.538 1.08c5.043 1.153 8.933 3.314 11.67 6.484 2.882 3.025 4.323 6.7 4.323 11.022 0 4.61-1.585 8.356-4.755 11.238-3.025 2.881-6.771 4.322-11.238 4.322Z"/></svg>
            </div>
            <div class="quote-text">
                <p class="quote-text__quote">{{ $component['quote'][0]['quote_text'] }}</p>
                @php
                    $citation = $component['quote'][0]['citation'][0];
                @endphp
                <p class="quote-text__accreditation">{{ $citation['name'] }}, {{ $citation['association'] }}</p>
            </div>
        </div>
    </div>
</div>
