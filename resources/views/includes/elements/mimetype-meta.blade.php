@if(isset($result['mimetype']))
    @if(!is_null($result['mimetype'] == 'application\pdf'))
        <span class="badge bg-info p-2 my-2 mr-1">
            @svg('fas-file-pdf', ['height' => 15, 'width' => 15])
            @svg('fas-download', ['height' => 15, 'width' => 15]) @humansize($result['filesize'][0],2)
        </span>
    @endif
@endif
