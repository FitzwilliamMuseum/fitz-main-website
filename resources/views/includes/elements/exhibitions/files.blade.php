@if(!isset($source))
    @php
        $source = $exhibition['exhibition_files']
    @endphp
@endif
@if(!empty($source))
    <x-exhibition-files :files="$source"></x-exhibition-files>
@endif
