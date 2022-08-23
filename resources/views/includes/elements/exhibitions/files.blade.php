@section('exhibitions-files')
    @if(!empty($exhibition['exhibition_files']))
        <x-exhibition-files :files="$exhibition['exhibition_files']"></x-exhibition-files>
    @endif
@endsection
