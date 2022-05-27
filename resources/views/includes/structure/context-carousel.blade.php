@section('context-carousel')
    <section>
        <div class="container-fluid bg-gdbo">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">Explore Contexts</h3>
                </div>

                <div class="col-12">
                    <div id="contexts" class="carousel slide" data-ride="carousel" data-bs-interval="false" data-pause="hover">
                        <div class="carousel-inner">
                            @foreach(array_chunk($contexts,3,true) as $slides)
                                @if($loop->first)
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="'active'"
                                        :imageObject="'hero_image'"
                                        :title="'section'"
                                        :route="'context-sections'"
                                        :param="'section'"
                                        :slugify="'false'"
                                    />
                                @else
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="''"
                                        :imageObject="'hero_image'"
                                        :title="'section'"
                                        :route="'context-sections'"
                                        :param="'section'"
                                        :slugify="'false'"
                                    />
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#contexts"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#contexts"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
