<div class="container mt-3">
    <h3>
        <a href="{{ route('exhibitions')}}">Current exhibitions and new displays</a>
    </h3>
    <div class="row">
        @foreach($exhibitions['data'] as $current)
            <x-exhibition-card
                :altTag="$current['hero_image_alt_text']"
                :title="$current['exhibition_title']"
                :image="$current['hero_image']"
                :route="'exhibition'"
                :params="[$current['slug']]"
                :startDate="$current['exhibition_start_date']"
                :endDate="$current['exhibition_end_date']"
                :status="'current'"
                :ticketed="$current['ticketed']"
                :tessitura="$current['tessitura_string']"
            />
        @endforeach
    </div>
</div>
