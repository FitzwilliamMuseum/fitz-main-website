@section('exhibition-faqs')

<style>
    .ex-faq>summary {
        list-style: none;
    }

    .ex-faq::-webkit-details-marker {
        display: none
    }

    .ex-faq summary::before {
        content: ' ';
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgLTk2MCA5NjAgOTYwIiB3aWR0aD0iNDgiPjxwYXRoIGQ9Ik00ODAtMzQ0IDI0MC01ODRsNDMtNDMgMTk3IDE5NyAxOTctMTk3IDQzIDQzLTI0MCAyNDBaIi8+PC9zdmc+');
        background-size: 100%;
        width: 35px;
        height: 35px;
        float: right;
        font-size: 0.9rem;
        transform: rotate(180deg);
        background-position-y: 2px;
    }

    .ex-faq[open] summary:before {
        transform: rotate(0deg);
    }
</style>
@if(!empty($faqs))
<div class="container mt-3">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">

        <details class="ex-faq">
            <summary>Frequently asked questions</summary>
            <br>
            @foreach($faqs as $faq)
            <x-faq :faq="$faq"></x-faq>
            @endforeach
        </details>
    </div>

</div>
@endif

@endsection