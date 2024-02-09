<div class="payment-grid">
    <ul class="grid-container">
        @if(!empty($component['cta_cards']))
            @foreach($component['cta_cards'] as $card)
                <li class="grid-card">
                    @if(!empty($card['heading']))
                        <h3>{{ $card['heading'] }}</h3>
                    @endif
                    @if(!empty($card['subheading']))
                        <p>{{ $card['subheading'] }}</p>
                    @endif
                    <p><span>{{ !empty($card['highlighted_text']) ? $card['highlighted_text'] : '' }}{{ !empty($card['highlighted_subtext']) ? $card['highlighted_subtext'] : '' }}</span></p>
                    @if(!empty($card['cta_link']))
                        <a href="{{ $card['cta_link'] }}">
                            @if($card['card_text'])
                                {{ $card['cta_text'] }}
                            @endif
                            @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                        </a>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</div>