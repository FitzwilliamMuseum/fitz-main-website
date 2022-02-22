@if(array_key_exists('techniques', $record['_source']))
<h3>Techniques used in production</h3>
<ul>
  @foreach($record['_source']['techniques'] as $techniques)
  @if(array_key_exists('reference', $techniques))
  <li>
    <a href="{{ URL::to(env('COLLECTION_URL'))}}/id/terminology/{{ $techniques['reference']['admin']['id']}}">{{ ucfirst($techniques['reference']['summary_title'])}}</a> @if(array_key_exists('description', $techniques))
  : {{ ucfirst($techniques['description'][0]['value'])}}
  </li>
  @endif
  @endif
  @endforeach
</ul>
@endif
