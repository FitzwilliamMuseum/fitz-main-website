<div class="payment-grid">
    <ul class="grid-container">
        @foreach($component['cta_cards'] as $card)
            <li class="grid-card">
                <h3>{{ $card['heading'] }}</h3>
                <p>{{ $card['subheading'] }}</p>
                <p><span>{{ $card['highlighted_text'] }}{{ $card['highlighted_subtext'] }}</span></p>
                <a href="{{ $card['cta_link'] }}">
                    {{ $card['cta_text'] }}
                    @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                </a>
            </li>
        @endforeach
    </ul>
</div>