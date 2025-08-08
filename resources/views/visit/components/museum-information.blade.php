@php
    $component = $component['museum_information'][0];
    $heading = isset($component['heading']) ? $component['heading'] : '';
    $subheading = isset($component['subheading']) ? $component['subheading'] : '';
    $hours = isset($component['hours']) ? $component['hours'] : '';
    $link = isset($component['info_link']) ? $component['info_link'][0] : '';
@endphp
<div class="museum-information">
    <div class="wrapper">
        <div class="information-intro">
            @if(!empty($heading))
                <h2>{{ $heading }}</h2>
            @endif
            @if(!empty($subheading))
                <p>{{ $subheading }}</p>
            @endif
            @if(!empty($link))
                <a href="{{ $link['link_url'] }}" class="button--block button--black">
                    {{ $link['link_text'] }}
                    @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                </a>
            @endif
        </div>
        @if(!empty($hours))
            <div class="information-hours">
                @php
                    $hours = $hours[0];
                @endphp
                @if(!empty($hours['heading']))
                    <h3>{{ $hours['heading'] }}</h3>
                @endif
                @if(!empty($hours['hours_list']))
                    <div class="hours-listing">
                        @foreach($hours['hours_list'] as $item)
                            <div class="hours-item">
                                @if(!empty($item['hours_item_heading']))
                                    <div class="hours-label">
                                        <p>{{ $item['hours_item_heading'] }}</p>
                                    </div>
                                @endif
                                @if(!empty($item['hours_item_times']))
                                    <div class="hours-time">
                                        <p>{{ $item['hours_item_times'] }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
                @if(!empty($hours['tag']) || !empty($hours['through_link_url']))
                    <div class="information-hours__footer">
                        @if(!empty($hours['tag']))
                            <p class="entry-price tag">{{ $hours['tag'] }}</p>
                        @endif
                        @if(!empty($hours['through_link_url']) && !empty($hours['through_link_text']))
                            <a href="{{ $hours['through_link_url'] }}">{{ $hours['through_link_text'] }}</a>
                        @endif
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
