@if(!empty($podcasts))
    @section('exhibitionAudio')
        <div class="container-fluid bg-gdbo py-2 mb-2">
            <div class="container">
                <h3>Audio</h3>
                <div class="row">
                    @foreach($podcasts['data'] as $podcast)
                        <x-image-card
                            :altTag="$podcast['hero_image_alt_tag']"
                            :title="$podcast['title']"
                            :image="$podcast['hero_image']"
                            :route="'podcasts.episode'"
                            :params="[$podcast['slug']]"></x-image-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif
