<div class="exhibition-cta">
    <div class="wrapper">
        <div class="container col-max-800 mx-auto support-text-component support-cta mb-0">
            <h2 class="cta-title exhibition-cta-title">Free</h2>
            <p class="cta-copy exhibition-cta-copy">Our exhibitions are free but we welcome donations</p>
            @if(!empty($exhibition['exhibition_url']))
                <a href="{{ $exhibition['exhibition_url'] }}" class="cta-btn">
                    Book your free ticket
                    @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                </a>
            @else
                <p class="cta-btn">Tickets available soon...</p>
            @endif
        </div>
        <a class="exhibition-cta-link" href="/plan-your-visit">Plan your visit</a>
    </div>
    @if(!empty($exhibition['exhibition_narrative']) || !empty($exhibition['promo_cta']))
        <div class="col-max-800 mx-auto support-text-component exhibition-text-component">
            @if(!empty($exhibition['exhibition_narrative']))
                @markdown($exhibition['exhibition_narrative'])
            @endif
            @if(!empty($exhibition['promo_cta']))
                {{-- If the Promo CTA switch is flipped to on / true --}}
                @if($exhibition['promo_cta'])
                    <div class="exhibition-cta--promo">
                        <p>Become a Friend and enjoy unlimited exhibition entry with no need to book.</p>
                        <a href="/become-a-friend">Find out more</a>
                    </div>
                @endif
            @endif
        </div>
    @endif
</div>
