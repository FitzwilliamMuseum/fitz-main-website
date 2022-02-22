@if(array_key_exists('medium', $record['_source']))
<h3>Materials used in production</h3>
<ul>
  @foreach($record['_source']['medium'] as $materials)

    @foreach($materials as $material)

      @if(array_key_exists('description', $material[0]))
        <li>{{ ucfirst($material[0]['description'][0]['value'])}}</li>
      @endif

      @if(array_key_exists('reference', $material[0]))
        <li><a href="{{ URL::to(env('COLLECTION_URL'))}}/id/terminology/{{ $material[0]['reference']['admin']['id']}}">{{ ucfirst($material[0]['reference']['summary_title'])}}</a></li>
      @endif

    @endforeach

  @endforeach
</ul>
@endif
