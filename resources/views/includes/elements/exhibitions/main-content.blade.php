@section('content')
<div class="container mt-3">

    @if(isset($exhibition['ticketed']) && $exhibition['ticketed'] == true && isset($exhibition['tessitura_string']))
    @if(!Carbon\Carbon::parse($exhibition['exhibition_end_date'])->isPast())
    @include('includes.structure.tessitura')
    @endif
    @endif
    @if(isset($exhibition['exhibition_end_date']))
    @if(Carbon\Carbon::parse($exhibition['exhibition_end_date'])->isPast())
    @include('includes.structure.expired')
    @endif
    @endif
    {{--
    This was previously used during Covid when visitors had to book general admission

    @if($exhibition['tessitura_string'] === NULL)
    @if(!Carbon\Carbon::parse($exhibition['exhibition_end_date'])->isPast() && $exhibition['exhibition_status'] ===
    'current')
    @include('includes.structure.general')
    @endif
    @endif --}}

    @if(isset($exhibition['exhibition_narrative']) || isset($exhibition['exhibition_abstract']))
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        @if(isset($exhibition['exhibition_narrative']))
        @markdown($exhibition['exhibition_narrative'])
        @endif
        @if(isset($exhibition['exhibition_abstract']))
        @markdown($exhibition['exhibition_abstract'])
        @endif
    </div>
    @endif

    {{-- @if( isset($exhibition['exhibition_url']) || isset($exhibition['exhibition_start_date']))--}}
    {{-- @php--}}
    {{-- $type = match($exhibition['type']){ 'display'=>'Temporary Display', default => 'Exhibition'}--}}
    {{-- @endphp--}}
    {{-- <h3>{{$type}} details</h3>--}}
    {{-- <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">--}}
        {{-- <ul>--}}
            {{-- @if(isset($exhibition['exhibition_url']))--}}
            {{-- <li>--}}
                {{-- <a href="{{ $exhibition['exhibition_url']  }}">{{$type}} website</a>--}}
                {{-- </li>--}}
            {{-- @endif--}}
            {{-- @if(isset($exhibition['exhibition_start_date']))--}}
            {{-- <li>--}}
                {{-- {{$type}}--}}
                {{-- run: {{ Carbon\Carbon::parse($exhibition['exhibition_start_date'])->format('j F Y') }}--}}
                {{-- to--}}
                {{-- {{ Carbon\Carbon::parse($exhibition['exhibition_end_date'])->format('j F Y') }}--}}
                {{-- </li>--}}
            {{-- @endif--}}
            {{-- </ul>--}}
        {{-- </div>--}}
    {{-- @endif--}}
</div>
@endsection