@if(!empty($exhibition['associated_departments']))
    @section('departments')
        <div class="container">
            <h3>Associated departments</h3>
            <div class="row">
                @foreach($exhibition['associated_departments'] as $department)
                    <x-image-card
                        :altTag="$department['departments_id']['hero_image_alt_text']"
                        :title="$department['departments_id']['title']"
                        :image="$department['departments_id']['hero_image']"
                        :route="'department'"
                        :params="[$department['departments_id']['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
