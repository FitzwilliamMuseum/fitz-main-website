@section('title', $viewpoint['title'])
<div>
    @foreach($viewpoint['associated_artworks'] as $image)
        @section('description', 'A viewpoint focused on ' . $image['ttn_labels_id']['alt_text'])
    <figure class="figure">
        <img class="figure-img img-fluid  my-2"
             src="{{$image['ttn_labels_id']['image']['data']['url']}}"
             alt="{{ $image['ttn_labels_id']['alt_text'] }}"
             width="{{ $image['ttn_labels_id']['image']['width'] }}"
             height="{{ $image['ttn_labels_id']['image']['height'] }}"
             loading="lazy"/>
        <figcaption class="figure-caption text-info">
            {{$image['ttn_labels_id']['image']['title']}}
        </figcaption>
    </figure>
    @endforeach
</div>

<div class="py-3">
    <blockquote class="blockquote">
        @markdown($viewpoint['viewpoint'])
        @if(!empty($viewpoint['poetry']))
            @markdown($viewpoint['poetry'])
        @endif
    </blockquote>
    <h2 class="text-info">
        @foreach($viewpoint['associated_people'] as $person)
            {{$person['associated_people_id']['display_name']}}@isset($person['associated_people_id']['associated_role'])
                , {{$person['associated_people_id']['associated_role']}}
            @endisset
            @if(!empty($person['associated_people_id']['associated_institution']))
                <br/>
                {{$person['associated_people_id']['associated_institution'][0]['partner_organisations_id']['partner_full_name']}}
            @endisset
            <br/>
        @endforeach
    </h2>
</div>
