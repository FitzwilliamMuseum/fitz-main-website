<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                {{ $file['learning_files_id']['title'] }}
            </h3>
            <ul>
                <li>Resource type: {{ ucfirst($file['learning_files_id']['type']) }}</li>
                <li>File size: @humansize($file['learning_files_id']['file']['filesize'], 2)</li>
                @if (isset($file['learning_files_id']['file']['type']))
                    <li>File type: PDF</li>
                @endif
            </ul>
            <a href="{{ $file['learning_files_id']['file']['data']['url'] }}" class="btn btn-dark d-block">
                <i class="fa fa-download mr-2" aria-hidden="true"></i> Download file
            </a>
        </div>
    </div>
</div>
