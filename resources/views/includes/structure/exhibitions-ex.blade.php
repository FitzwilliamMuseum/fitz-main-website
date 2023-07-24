<div class="container mt-3 container-home-cards">
    <h3>
        <a href="{{ route('exhibitions')}}">What's on</a>
    </h3>
    <div class="row row-ex">
        @foreach($exhibitions['data'] as $current)
            <x-exhibition-card-ex
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

<style>
    .container-home-cards{
        padding: 20px 16px 30px 16px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: max-content 1fr;
        grid-gap: 18px;
        grid-auto-columns: 33.3333%;
    }

    h3 {
        grid-row: 1 / 2;
        grid-column: 1 / -1;
    }

    .row-ex {
        grid-row: 2 / 3;
        grid-column: 1 / -1;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        grid-gap: 10px;
    }
    .card-image {
        position: relative;
        padding-top: 56.25%;
    }
    .card-image img {
        position: absolute;
        top: 0px;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .container-home-card {
        width: 100%;
    }
</style>
