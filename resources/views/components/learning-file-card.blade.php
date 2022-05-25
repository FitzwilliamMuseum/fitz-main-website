<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h2>
                    {{ $file['learning_files_id']['title'] }}
                </h2>
                <ul>
                    <li>Resource type: {{ ucfirst($file['learning_files_id']['type']) }}</li>
                    <li>File size: @humansize($file['learning_files_id']['file']['filesize'],2)</li>
                    @if(isset($file['learning_files_id']['file']['type']))
                        <li>File type: PDF</li>
                    @endif
                </ul>
                <a href="{{ $file['learning_files_id']['file']['data']['url'] }}" class="btn btn-dark d-block">
                    <i class="fa fa-download mr-2" aria-hidden="true"></i>  Download file
                </a>
            </div>
        </div>
    </div>
</div>
