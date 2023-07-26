@section('group-visits')

    <style>
        .group-visits button {
            /*text-transform:uppercase;*/
            /*font-weight:bold;*/
            /*font-size:1.1em;*/
            padding:0;
            width:100%;
            text-align:left!important;
            height:1.6rem;
        }
        .card-header button::before {
            background:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgLTk2MCA5NjAgOTYwIiB3aWR0aD0iNDgiPjxwYXRoIGQ9Ik00ODAtMzQ0IDI0MC01ODRsNDMtNDMgMTk3IDE5NyAxOTctMTk3IDQzIDQzLTI0MCAyNDBaIi8+PC9zdmc+');
            content:' ';
            width:28px;
            height:28px;
            background-size:100%;
            float:right;
            transform:rotate(180deg);
        }
        .group-visits button[aria-expanded=true]::before {
            transform:rotate(0deg);
        }
        .group-visits .card-header {
            border-bottom:#000 2px solid;
            padding:0.5em 0;
        }

    </style>
    <div class="container-fluid bg-white py-3 group-visits">
    <div class="container mb-3">
        <div class="accordion mt-2" id="accordionDirections">

            @foreach ($group_visits['data'] as $group_visit)

                <div class="card">
                    <div class="card-header" id="heading{{ $loop->index }}">
                        <button class="btn d-block text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                            {{ $group_visit['heading'] }}
                        </button>
                    </div>
                    <div id="collapse{{ $loop->index }}" class="collapse" aria-labelledby="heading{{ $loop->index }}"
                         data-parent="#accordionDirections">
                        <div class="card-body" style="padding-left:1em 0 0 0;">
                            @markdown($group_visit['content'])
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
</div>
@endsection
