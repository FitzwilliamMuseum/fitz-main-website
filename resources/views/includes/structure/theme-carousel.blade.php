@section('theme-carousel')
<section class="container-fluid py-2">
    <div class="container">
        <div class="row">
            <h3 class="my-3">Explore themes</h3>
            <div id="pharos" class="carousel slide" data-ride="carousel" data-bs-interval="false" data-pause="hover">
                <div class="carousel-inner">
                    @foreach(array_chunk($pharos['data'],3,true) as $slides)
                    @if($loop->first)
                    <x-carousel-slide :slides="$slides" :class="'active'" :imageObject="'hero_image'" :title="'title'"
                        :route="'theme'" :param="'slug'" :slugify="'false'" />
                    @else
                    <x-carousel-slide :slides="$slides" :class="''" :imageObject="'hero_image'" :title="'title'"
                        :route="'theme'" :param="'slug'" :slugify="'false'" />
                    @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#pharos" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#pharos" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
@endsection
