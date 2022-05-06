@if(str_contains($result['contentType'][0], 'instagram'))
    <h3>
        An Instagram post
    </h3>
@elseif (str_contains($result['contentType'][0], 'twitter'))
    <h3>
        A Twitter post
    </h3>
@else
    <h3>
        <a href="{{ $result['url'][0]}}"
           class="stretched-link">{{ $result['title'][0] }}</a>
    </h3>
@endif
