@if(array_key_exists('materials', $record['_source']))
<h4 class="lead">Materials used in production</h4>
<ul>
  @foreach($record['_source']['materials'] as $material)
    @foreach($material as $mat)
      @if(array_key_exists('admin', $mat))
      <li><a href="{{ URL::to(env('COLLECTION_URL'))}}/id/terminology/{{ $mat['admin']['id']}}">{{ ucfirst($mat['summary_title'])}}</a></li>
      @endif
    @endforeach
  @endforeach
</ul>
@endif
