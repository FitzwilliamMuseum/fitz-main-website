@if(!empty($exhibition['associated_galleries']))
    @section('galleries')
        <div class="container-fluid bg-dark text-white py-3">
            <div class="container">
                <h3 class="mb-3">
                    Associated Galleries
                </h3>
                <div class="row">
                    @foreach($exhibition['associated_galleries'] as $gallery)
                        <x-image-card
                            :altTag="$gallery['galleries_id']['hero_image_alt_text']"
                            :title="$gallery['galleries_id']['gallery_name']"
                            :image="$gallery['galleries_id']['hero_image']"
                            :route="'gallery'"
                            :params="[$gallery['galleries_id']['slug']]"></x-image-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif

