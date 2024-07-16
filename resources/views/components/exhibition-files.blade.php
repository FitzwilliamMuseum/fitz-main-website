@if(!empty($files))
<div class="container">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <h2>Exhibition files and maps</h2>
        <ul>
            @foreach($files as $file)
            <li>
                @if(!empty($file['directus_files_id']))
                <a href="{{ $file['directus_files_id']['data']['full_url'] }}">
                    {{ $file['directus_files_id']['title'] }}
                </a>
                @elseif(!empty($file['related_document_id']))
                <a href="{{ $file['related_document_id']['data']['full_url'] }}">
                    {{ $file['related_document_id']['title'] }}
                </a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif