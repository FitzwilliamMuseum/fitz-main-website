@php
    /*
        Carbon::createFromFormat('Y-m-d', $exhibition["exhibition_end_date"])->endOfDay()->isPast()
        Is checking if the end date of an exhibition is in the past.
        If the end date is today, it will return false until the end of the day (23:59:59).
    */
    $exhibitionStatus = (!empty($exhibition["exhibition_end_date"]) && \Carbon\Carbon::createFromFormat('Y-m-d', $exhibition["exhibition_end_date"])->endOfDay()->isPast()) ? 'display: none;' : '';
    $exhibitionType = (!empty($exhibition['event_type']) && $exhibition['event_type'] == 'display' ? 'display' : 'exhibition');
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

        @if ($exhibitionTypeIsDisplay)
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
        @if($madeInEgyptExhibition)
                <p class="exhibition-cta-link exhibition-cta-link--egypt">
                    Be the first to hear about ticket releases,
                    <a href="https://tickets.museums.cam.ac.uk/account/create/brief">
                        sign up to our emails
                    </a>
                </p>

        @else
            <a class="exhibition-cta-link" href="/plan-your-visit">Plan your visit</a>
        @endif
    </div>

    @if (!empty($exhibition['exhibition_narrative']) || !empty($exhibition['promo_cta']))
        <div class="container support-text-component exhibition-text-component {{ $exhibitionStatus ? 'exhibition-text-component--archived' : '' }}">
            @if (!empty($exhibition['exhibition_narrative']))
                @markdown($exhibition['exhibition_narrative'])
            @endif

            @if (!empty($exhibition['promo_cta']) && $exhibition['promo_cta'])
                <div class="exhibition-cta--promo">
                    <p>Become a Friend and enjoy unlimited {{ $madeInEgyptExhibition ? 'free ' : '' }}exhibition entry with no need to book. <a href="/support-us/become-a-friend" style="white-space: nowrap;">Find out more</a></p>
                </div>
            @endif
        </div>
    @endif
</div>
