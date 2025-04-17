@php
    /*
        Carbon::createFromFormat('Y-m-d', $exhibition["exhibition_end_date"])->endOfDay()->isPast()
        Is checking if the end date of an exhibition is in the past.
        If the end date is today, it will return false until the end of the day (23:59:59).
    */
    $exhibitionStatus = (!empty($exhibition["exhibition_end_date"]) && \Carbon\Carbon::createFromFormat('Y-m-d', $exhibition["exhibition_end_date"])->endOfDay()->isPast()) ? 'display: none;' : '';
    /*
        Changes introduced by $madeInEgyptExhibition flag:
        1. CTA Title:
           - made-in-ancient-egypt: "Tickets"
           - others: "Pay what you wish"
        2. Sub text:
           - made-in-ancient-egypt: "Book your tickets and timed entry slot online"
           - others: "Our exhibitions and displays remain free but you can now choose to make a donation"
        3. CTA Button copy:
           - made-in-ancient-egypt (no URL): "Coming soon"
           - others (no URL): "Tickets available soon"
        4. Secondary Link:
           - made-in-ancient-egypt: "Sign up to our emails" -> tickets.museums.cam.ac.uk/account/create/brief
           - others: "Plan your visit" -> /plan-your-visit
        5. Promo text:
           - made-in-ancient-egypt: adds "free" before "exhibition entry"
           - others: omits "free"
    */
    $madeInEgyptExhibition = $exhibition['slug'] == 'made-in-ancient-egypt';

    $donateNowSlugs = [
        'rembrandt-rubens-van-dyck',
        'rembrandt-rubens-van-dyck-drawings-by-dutch-and-flemish-masters',
        'national-treasures-botticelli-in-cambridge',
        'women-in-japanese-prints',
        'glenn-ligon-all-over-the-place',
        'picturing-excess-jan-davidsz-de-heem',
        'whats-new-2',
        'discovering-duerer'
    ];
@endphp

<div class="exhibition-cta">
    <div class="container support-text-component support-cta mb-0" style="{{ $exhibitionStatus }}">
        <h2 class="cta-title exhibition-cta-title">
            {{ $madeInEgyptExhibition ? 'Tickets' : 'Pay what you wish' }}
        </h2>
        <p class="cta-copy exhibition-cta-copy">
            {{ $madeInEgyptExhibition
                ? 'Book your tickets and timed entry slot online.'
                : 'Our exhibitions and displays remain free but you can now choose to make a donation.' }}
        </p>

        @if (in_array($exhibition['slug'], $donateNowSlugs))
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
            <p class="cta-btn">{{ $madeInEgyptExhibition ? 'Coming soon' : 'Tickets available soon' }}</p>
        @endif

        <a class="exhibition-cta-link"
           href="{{ $madeInEgyptExhibition
                    ? 'https://tickets.museums.cam.ac.uk/account/create/brief'
                    : '/plan-your-visit' }}">
            {{ $madeInEgyptExhibition ? 'Sign up to our emails' : 'Plan your visit' }}
        </a>
    </div>

    @if (!empty($exhibition['exhibition_narrative']) || !empty($exhibition['promo_cta']))
        <div class="container support-text-component exhibition-text-component {{ $exhibitionStatus ? 'exhibition-text-component--archived' : '' }}">
            @if (!empty($exhibition['exhibition_narrative']))
                @markdown($exhibition['exhibition_narrative'])
            @endif

            @if (!empty($exhibition['promo_cta']) && $exhibition['promo_cta'])
                <div class="exhibition-cta--promo">
                    <p>Become a Friend and enjoy unlimited {{ $madeInEgyptExhibition ? 'free ' : '' }}exhibition entry with no need to book.</p>
                    <a href="/support-us/become-a-friend">Find out more</a>
                </div>
            @endif
        </div>
    @endif
</div>
