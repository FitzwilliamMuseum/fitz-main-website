<div class="container">
    <h3>Our research projects</h3>
    <div class="row">
        @foreach($research['data'] as $project)
            <x-image-card
                :altTag="$project['hero_image_alt_text']"
                :title="$project['title']"
                :image="$project['hero_image']"
                :route="'research-project'"
                :params="[$project['slug']]"></x-image-card>
        @endforeach
    </div>
</div>
