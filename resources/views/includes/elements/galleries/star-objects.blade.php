@if(!empty($gallery['star_objects']))
    <h3>
        Object stories
    </h3>
    <div class="row">
        @foreach($gallery['star_objects'] as $object)
            <x-image-card
                :image="$object['pharos_id']['image']"
                :altTag="$object['pharos_id']['image_alt_text']"
                :route="'highlight'"
                :params="[$object['pharos_id']['slug']]"
                :title="$object['pharos_id']['title']"></x-image-card>
        @endforeach
    </div>
@endif
