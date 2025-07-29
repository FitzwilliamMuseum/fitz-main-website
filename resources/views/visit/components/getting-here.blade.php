@php
    $component = $component['getting_here'][0];

    $heading = isset($component['heading']) ? $component['heading'] : null;
    $tagline = isset($component['tagline']) ? $component['tagline'] : null;
    $location =isset( $component['location']) ?  $component['location'] : null;
    $methods = isset($component['travel_methods']) ? $component['travel_methods'] : null;
    $isAnchor =isset( $component['include_in_anchor_links']) ?  $component['include_in_anchor_links'] : null;
@endphp
<div class="getting-here">
    <div class="wrapper">
        <div class="getting-here__wrap"@if(!empty($isAnchor) && $isAnchor) data-is-anchor id="getting-here" @endif>
            <div class="getting-here__map">
                @yield('map')
            </div>
            <div class="getting-here__details" id="accordionDirections">
                @if(!empty($heading))
                    <h2>{{ $heading }}</h2>
                @endif
                @if(!empty($subheading))
                    <p>{{ $subheading }}</p>
                @endif
                @if(!empty($location))
                    <p class="location">
                        @svg('fas-location-dot', ['width' => '14px', 'height' => '20px', 'color' => '#000'])
                        {{ $location }}
                    </p>
                @endif
                @if(!empty($methods))
                    <div class="getting-here__accordion">
                        @foreach($methods as $item)
                            <div class="accordion-item">
                                <button type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#directions-content-{{ $loop->index }}"
                                aria-expanded="false"
                                aria-controls="directions-content-{{ $loop->index }}"
                                id="directions-heading-{{ $loop->index }}">
                                    {{ $item['heading'] }}
                                    @svg('fas-chevron-down', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                                </button>
                                <div class="collapse" id="directions-content-{{ $loop->index }}" aria-labelledby="directions-heading-{{ $loop->index }}" data-parent="#accordionDirections">
                                    <p>{{ $item['instructions'] }}</p>
                                    @if(!empty($item['links']))
                                        <div class="getting-here__accordion-links">
                                            @foreach($item['links'] as $link)
                                                <a href="{{ $link['link_url'] }}"
                                                @if($link['link_style'] == 'button') class="button button--block button--black" @endif>
                                                    {{ $link['link_text'] }}
                                                    @if($link['link_style'] == 'button')
                                                        @svg('fas-chevron-left', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                                                    @endif

                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
