@foreach($areas['data'] as $area)
    @if(!empty($area['associated_research']))
@section('research-projects')
    <div class="container">
        <h2>Associated Research Projects</h2>
        <div class="row">
            @foreach($area['associated_research'] as $area)
                <x-image-card
                    :image="$area['research_projects_id']['hero_image']"
                    :altTag="$area['research_projects_id']['hero_image_alt_text']"
                    :route="'research-project'"
                    :params="[$area['research_projects_id']['slug']]"
                    :title="$area['research_projects_id']['title']"
                />
            @endforeach
        </div>
    </div>
@endsection
@endif
@endforeach
