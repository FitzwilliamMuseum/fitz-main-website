@if($result['contentType'][0] == 'learning_files')
    <span class="badge badge-wine p-2">{{ $result['learningfiletype'][0]}}</span>
    @if(isset($result['keystages']))
        <span class="badge badge-wine p-2">Key Stages this is for: {{ implode(', ', $result['keystages']) }}</span>
    @endif
    @if(isset($result['curriculum_area']))
        <span class="badge badge-wine p-2">{{ $result['curriculum_area'][0]}}</span>
    @endif
@endif
