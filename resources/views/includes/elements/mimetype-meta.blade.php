@if(isset($result['mimetype']))
    @if(!is_null($result['mimetype'] == 'application\pdf'))
        <span class="badge badge-dark p-2">
            <i class="fas fa-file-pdf mr-2"></i>
            <i class="fa fa-download mr-2" aria-hidden="true"></i> @humansize($result['filesize'][0],2)
        </span>
    @endif
@endif
