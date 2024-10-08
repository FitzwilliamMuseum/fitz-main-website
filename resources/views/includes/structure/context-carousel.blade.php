@section('context-carousel')
<section class="container-fluid bg-gdbo py-2">
    <div class="container">
        <h3 class="my-3">Explore Contexts</h3>
        <div class="row">
            <div id="contexts" class="collection-carousel carousel slide" data-ride="carousel" data-bs-interval="false" data-pause="hover">
                <div class="carousel-inner">
                    @foreach(array_chunk($contexts,3,true) as $slides)
                    @if($loop->first)
                    <x-carousel-slide :slides="$slides" :class="'active'" :imageObject="'hero_image'" :title="'section'"
                        :route="'context-sections'" :param="'section'" :slugify="'false'" />
                    @else
                    <x-carousel-slide :slides="$slides" :class="''" :imageObject="'hero_image'" :title="'section'"
                        :route="'context-sections'" :param="'section'" :slugify="'false'" />
                    @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#contexts" data-bs-slide="prev">
                    <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path fill="black" d="M0 0h48v48h-48z"></path>
                        <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                    </svg>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#contexts" data-bs-slide="next">
                    <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path fill="black" d="M0 0h48v48h-48z"></path>
                        <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                    </svg>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

@endsection
