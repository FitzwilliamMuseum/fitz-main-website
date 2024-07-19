<div class="container container-home-cards">
    <h2>
        <a href="{{ route('exhibitions')}}">{{ $listing_title }}</a>
    </h2>
    <div class="row row-home">
        @if ($listing_type == "upcoming")
            @foreach($settings['whats_on'] as $current)
                @if(!empty($current['exhibitions_id']))
                    <x-exhibition-card
                        :altTag="$current['exhibitions_id']['hero_image_alt_text']"
                        :title="$current['exhibitions_id']['exhibition_title']"
                        :headingLevel=3
                        :image="$current['exhibitions_id']['hero_image']"
                        :route="'exhibition'"
                        :params="[$current['exhibitions_id']['slug']]"
                        :startDate="$current['exhibitions_id']['exhibition_start_date']"
                        :endDate="$current['exhibitions_id']['exhibition_end_date']"
                        :status="'current'"
                        :source="'homepage'"
                        :ticketed="$current['exhibitions_id']['ticketed']"
                        :tessitura="$current['exhibitions_id']['tessitura_string']"
                    />
                @endif
            @endforeach
        @elseif ($listing_type == "future")
            @foreach($settings['coming_soon'] as $current)
                @if(!empty($current['exhibitions_id']))
                    <x-exhibition-card
                        :altTag="$current['exhibitions_id']['hero_image_alt_text']"
                        :title="$current['exhibitions_id']['exhibition_title']"
                        :headingLevel=3
                        :image="$current['exhibitions_id']['hero_image']"
                        :route="'exhibition'"
                        :params="[$current['exhibitions_id']['slug']]"
                        :startDate="$current['exhibitions_id']['exhibition_start_date']"
                        :endDate="$current['exhibitions_id']['exhibition_end_date']"
                        :status="'current'"
                        :source="'homepage'"
                        :ticketed="$current['exhibitions_id']['ticketed']"
                        :tessitura="$current['exhibitions_id']['tessitura_string']"
                    />
                @endif
            @endforeach
        @endif
    </div>
</div>
