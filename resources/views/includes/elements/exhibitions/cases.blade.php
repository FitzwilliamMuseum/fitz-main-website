@if(!empty($cases['data']))
    @section('exhibitionCaseCards')
        <div class="container-fluid bg-pastel py-3">
            <div class="container">
                <h3 class="lead text-white">
                    <a href="">
                        Exhibition Case Introductions
                    </a>
                </h3>
                <div class="row">
                    @foreach($cases['data'] as $case)
                        <x-image-card
                            :altTag="$case['title']"
                            :title="$case['title']"
                            :image="$case['cover_image']"
                            :route="'exhibition.labels'"
                            :params="['exhibition' => $case['related_exhibition'][0]['exhibitions_id']['slug'],'slug' => $case['slug']]"></x-image-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif
