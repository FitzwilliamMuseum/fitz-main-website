@php
    $status = !empty($exhibition['exhibition_status']) && $exhibition['exhibition_status'] == 'archived' ? 'display: none;' : ''
@endphp
<div class="exhibition-cta">
    <div class="container support-text-component support-cta mb-0"
    style="{{ $status }}">
        <h2 class="cta-title exhibition-cta-title">Pay what you wish</h2>
        <p class="cta-copy exhibition-cta-copy">Our exhibitions and displays remain free but you can now choose to make a
            donation.</p>
        @if (
            $exhibition['slug'] == 'rembrandt-rubens-van-dyck' ||
                $exhibition['slug'] == 'rembrandt-rubens-van-dyck-drawings-by-dutch-and-flemish-masters' ||
                $exhibition['slug'] == 'national-treasures-botticelli-in-cambridge')
            <a href="{{ url('support-us/make-a-donation') }}" class="cta-btn">
                Donate now
                @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
            </a>
        @elseif(!empty($exhibition['exhibition_url']))
            <a href="{{ $exhibition['exhibition_url'] }}" class="cta-btn">
                Book now
                @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
            </a>
        @else
            <p class="cta-btn">Tickets available soon...</p>
        @endif
        <a class="exhibition-cta-link" href="/plan-your-visit">Plan your visit</a>
    </div>
    @if (!empty($exhibition['exhibition_narrative']) || !empty($exhibition['promo_cta']))
        <div class="container support-text-component exhibition-text-component {{ $status ? 'exhibition-text-component--archived' : '' }}">
            @if (!empty($exhibition['exhibition_narrative']))
                @markdown($exhibition['exhibition_narrative'])
            @endif
            @if (!empty($exhibition['promo_cta']))
                {{-- If the Promo CTA switch is flipped to on / true --}}
                @if ($exhibition['promo_cta'])
                    <div class="exhibition-cta--promo">
                        <p>Become a Friend and enjoy unlimited exhibition entry with no need to book.</p>
                        <a href="/support-us/become-a-friend">Find out more</a>
                    </div>
                @endif
            @endif
        </div>
    @endif
</div>
