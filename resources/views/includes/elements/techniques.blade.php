@if(array_key_exists('techniques', $record['_source']))
<h4 class="lead">Techniques used in production</h4>
<ul>
  @foreach($record['_source']['techniques'] as $techniques)
  @if(array_key_exists('reference', $techniques))
  <li><a href="{{ URL::to(env('COLLECTION_URL'))}}/id/terminology/{{ $techniques['reference']['admin']['id']}}">{{ ucfirst($techniques['reference']['summary_title'])}}</a> @if(array_key_exists('description', $techniques))
  : {{ ucfirst($techniques['description'][0]['value'])}}
  @endif</li>
  @endif
  @endforeach
</ul>
@endif
