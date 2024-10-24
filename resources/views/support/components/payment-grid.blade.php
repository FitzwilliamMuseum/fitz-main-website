
@if(!empty($component['cta_cards']))
    <div class="payment">
        <div class="payment-grid">
            <ul class="grid-container">
                @foreach($component['cta_cards'] as $card)
                    <li class="grid-item">
                        <div class="grid-card">
                            @if(!empty($card['heading']))
                                @php
                                    $heading_clean = str_replace(array( '(', ')' ), '', strtolower($card['heading']));
                                    $heading_slugified = str_replace(' ', '-', $heading_clean);
                                @endphp
                                <h2 id="{{ $heading_slugified }}">{{ $card['heading'] }}</h2>
                            @endif
                            @if(!empty($card['subheading']))
                                <p>{{ $card['subheading'] }}</p>
                            @endif
                            <p>
                                <span>
                                    {{ !empty($card['highlighted_text']) ? $card['highlighted_text'] : '' }}
                                </span>
                                {{ !empty($card['highlighted_subtext']) ? $card['highlighted_subtext'] : '' }}
                            </p>
                            @if(!empty($card['cta_options']))
                                @foreach($card['cta_options'] as $cta_option)
                                    <a href="{{ $cta_option['cta_link'] }}" aria-describedby="{{ isset($heading_slugified) ? $heading_slugified : '' }}">
                                        @if(!empty($cta_option['cta_text']))
                                            {{ $cta_option['cta_text'] }}
                                        @endif
                                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
