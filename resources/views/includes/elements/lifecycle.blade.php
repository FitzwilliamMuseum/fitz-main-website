@if(array_key_exists('lifecycle',$record['_source'] ))

  @if(array_key_exists('acquisition', $record['_source']['lifecycle']))
    <h5>Acquisition and important dates</h5>
    <ul>
      @foreach($record['_source']['lifecycle']['acquisition'] as $acquistion)
        @if(array_key_exists('method', $acquistion))
          <li>Method of acquisition: {{ ucfirst($acquistion['method']['value']) }}</li>
        @endif
        @if(array_key_exists('date', $acquistion))
          <li>Dates: {{ $acquistion['date'][0]['value'] }}</li>
        @endif
      @endforeach
    </ul>
  @endif

  @if(array_key_exists('creation', $record['_source']['lifecycle']))
    <h5>Dating</h5>

    @if(array_key_exists('note',$record['_source']['lifecycle']['creation'][0]))
      <p>Production note: {{ $record['_source']['lifecycle']['creation'][0]['note'][0]['value'] }}</p>
    @endif
    <ul>
      @if(array_key_exists('periods', $record['_source']['lifecycle']['creation'][0]))
        @foreach($record['_source']['lifecycle']['creation'][0]['periods'] as $date)
          <li><a href="{{ URL::to(env('COLLECTION_URL'))}}/id/terminology/{{ $date['admin']['id']}}">{{ ucfirst($date['summary_title']) }}</a></li>
        @endforeach
      @endif

      @if(array_key_exists('date', $record['_source']['lifecycle']['creation'][0]))
        <li>Production date:
          @if(isset($record['_source']['lifecycle']['creation'][0]['date'][0]['precision']))
            {{ $record['_source']['lifecycle']['creation'][0]['date'][0]['precision'] }}
          @endif
          @php
          $dateTime = $record['_source']['lifecycle']['creation'][0]['date'][0]['value'];
          if($dateTime < 0){
            $suffix = ' BCE';
            $string = abs($dateTime) . '' . $suffix;
          } else {
            $suffix = 'AD ';
            $string = $suffix . '' . $dateTime;
          }
          @endphp
          {{ $string }}
          @if(array_key_exists('note', $record['_source']['lifecycle']['creation'][0]['date'][0]))
            : {{ $record['_source']['lifecycle']['creation'][0]['date'][0]['note'][0]['value']}}
          @endif
        </li>
      @endif
    </ul>
  @endif
  @if(array_key_exists('creation', $record['_source']['lifecycle']))
    @if(array_key_exists('maker',$record['_source']['lifecycle']['creation'][0]))
      <h5>Maker(s)</h5>
      <ul>
        @foreach($record['_source']['lifecycle']['creation'][0]['maker'] as $maker)
          @if(array_key_exists('@link', $maker))
            <li>
              @if(array_key_exists('role', $maker['@link']))
                @foreach($maker['@link']['role'] as $role)
                  {{ preg_replace('@\x{FFFD}@u', 'î',(ucfirst($role['value'])))}}:
                @endforeach
              @endif
              @if(array_key_exists('admin', $maker))
                <a href="{{ URL::to(env('COLLECTION_URL'))}}/id/agent/{{ $maker['admin']['id']}}">{{ preg_replace('@\x{FFFD}@u', 'î',($maker['summary_title']))}}</a></li>
              @else
                {{ preg_replace('@\x{FFFD}@u', 'î',($maker['summary_title']))}}
              @endif
            @endif
          </li>
        @endforeach
      </ul>
    @endif
    @if(array_key_exists('places', $record['_source']['lifecycle']['creation'][0]))
      <h5>Place(s) associated</h5>
      <ul>
        @foreach($record['_source']['lifecycle']['creation'][0]['places'] as $place)
          <li>{{ preg_replace('@\x{FFFD}@u', 'î', $place['summary_title']) }}</li>
        @endforeach
      </ul>
    @endif
  @endif
@endif
