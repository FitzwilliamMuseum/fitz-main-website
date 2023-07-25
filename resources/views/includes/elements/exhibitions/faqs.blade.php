@section('exhibition-faqs')

    @if(!empty($faqs))
        <div class="container mt-3">
            <h3>Frequently asked questions</h3>

            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                @foreach($faqs as $faq)
                    <x-faq :faq="$faq"></x-faq>
                @endforeach
            </div>
            
        </div>
    @endif

@endsection
