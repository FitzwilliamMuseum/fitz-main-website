@if(!empty($files))
    <div class="container">
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <h3>Exhibition files and maps</h3>
            <ul>
                @foreach($files as $file)
                    <li>
                        <a href="{{ $file['directus_files_id']['data']['full_url'] }}">
                            {{ $file['directus_files_id']['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
