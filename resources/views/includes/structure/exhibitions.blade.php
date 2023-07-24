<div class="container mt-3">
    <h3>
        <a href="{{ route('exhibitions')}}">What's on</a>
    </h3>
    <div class="row">
        {{-- {{ json_encode($settings['whats_on']) }} --}}
        @foreach($settings['whats_on'] as $current)
            <x-exhibition-card
                :altTag="$current['exhibitions_id']['hero_image_alt_text']"
                :title="$current['exhibitions_id']['exhibition_title']"
                :image="$current['exhibitions_id']['hero_image']"
                :route="'exhibition'"
                :params="[$current['exhibitions_id']['slug']]"
                :startDate="$current['exhibitions_id']['exhibition_start_date']"
                :endDate="$current['exhibitions_id']['exhibition_end_date']"
                :status="'current'"
                :ticketed="$current['exhibitions_id']['ticketed']"
                :tessitura="$current['exhibitions_id']['tessitura_string']"
            />
        @endforeach
    </div>
</div>
