@section('period-carousel')
    <section>
        <div class="container-fluid bg-pastel">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">Explore periods</h3>
                </div>
                <div class="col-12">
                    <div id="periods" class="carousel slide" data-ride="carousel" data-bs-interval="false" data-pause="hover">
                        <div class="carousel-inner">
                            @foreach(array_chunk($periods,3,true) as $slides)
                                @if($loop->first)
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="'active'"
                                        :imageObject="'image'"
                                        :title="'period_assigned'"
                                        :route="'period'"
                                        :param="'period_assigned'"
                                        :slugify="'true'"
                                    />
                                @else
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="''"
                                        :imageObject="'image'"
                                        :title="'period_assigned'"
                                        :route="'period'"
                                        :param="'period_assigned'"
                                        :slugify="true"
                                    />
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#periods"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#periods"
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
