@if(!empty($exhibition['associated_curators']) || !empty($exhibition['external_curators']))
    @section('curators')
        <div class="container-fluid py-3">
            <div class="container">
                <h3>Curators and experts behind this exhibition</h3>
                <div class="row">
                    @foreach($exhibition['associated_curators'] as $curator)
                        <x-image-card
                            :altTag="$curator['staff_profiles_id']['display_name']"
                            :title="$curator['staff_profiles_id']['display_name']"
                            :image="$curator['staff_profiles_id']['profile_image']"
                            :route="'research-profile'"
                            :params="[$curator['staff_profiles_id']['slug']]"></x-image-card>
                    @endforeach
                    @foreach($exhibition['external_curators'] as $curator)
                        <x-associated-curator
                            :curator="$curator"></x-associated-curator>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif
