@if(str_contains($result['contentType'][0], 'instagram'))
    <h2>
        An Instagram post
    </h2>
@elseif (str_contains($result['contentType'][0], 'twitter'))
    <h2>
        A Twitter post
    </h2>
@else
    <h2>
        <a href="{{ $result['url'][0]}}" class="stretched-link">
            {{ html_entity_decode($result['title'][0]) }}
        </a>
    </h2>
@endif
