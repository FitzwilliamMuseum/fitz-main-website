@if(array_key_exists('lifecycle',$record['_source'] ))
    @if(array_key_exists('acquisition', $record['_source']['lifecycle']))
        <h3>Acquisition and important dates</h3>
        <ul>
            @foreach($record['_source']['lifecycle']['acquisition'] as $acquisition)
                @if(array_key_exists('method', $acquisition))
                    <li>Method of acquisition: {{ ucfirst($acquisition['method']['value']) }}</li>
                @endif
                @if(array_key_exists('date', $acquisition))
                    <li>Dates: {{ $acquisition['date'][0]['value'] }}</li>
                @endif
            @endforeach
        </ul>
    @endif

    @if(array_key_exists('creation', $record['_source']['lifecycle']))
        @if(array_key_exists('date', $record['_source']['lifecycle']['creation'][0]))

            <h3>Dating</h3>

            @if(array_key_exists('note',$record['_source']['lifecycle']['creation'][0]))
                @foreach($record['_source']['lifecycle']['creation'][0]['note'] as $note)
                    <p>{{ $note['value'] }}</p>
                @endforeach
            @endif

            <ul>
                @if(array_key_exists('periods', $record['_source']['lifecycle']['creation'][0]))
                    @foreach($record['_source']['lifecycle']['creation'][0]['periods'] as $date)
                        <li>
                            <a href="{{ env('COLLECTION_URL') }}/id/terminology/{{ $date['admin']['id']}}">{{ ucfirst($date['summary_title']) }}</a>
                        </li>
                    @endforeach
                @endif

                @if(array_key_exists('value', $record['_source']['lifecycle']['creation'][0]['date'][0]))
                    <li>Production date:
                        @if(isset($record['_source']['lifecycle']['creation'][0]['date'][0]['precision']))
                            {{ $record['_source']['lifecycle']['creation'][0]['date'][0]['precision'] }}
                        @endif
                        @php
                            if(array_key_exists('value', $record['_source']['lifecycle']['creation'][0]['date'][0])) {
                              $dateTime = $record['_source']['lifecycle']['creation'][0]['date'][0]['value'];
                              if($dateTime < 0){
                                $suffix = ' BC';
                                $string = abs($dateTime) .  $suffix;
                              } else {
                                $suffix = 'AD ';
                                $string = $suffix .  $dateTime;
                              }
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

    @endif

    @if(array_key_exists('creation', $record['_source']['lifecycle']))
        @if(array_key_exists('maker',$record['_source']['lifecycle']['creation'][0]))
            <h3>Maker(s)</h3>
            <ul>
                @foreach($record['_source']['lifecycle']['creation'][0]['maker'] as $maker)
                    @if(array_key_exists('@link', $maker))
                        <li>
                            @if(array_key_exists('@link', $maker))
                                @if(array_key_exists('qualifier',$maker['@link']))
                                    {{ ucfirst($maker['@link']['qualifier']) }}
                                @endif
                            @endif

                            @if(array_key_exists('admin', $maker))
                                <a href="{{ env('COLLECTION_URL') }}/id/agent/{{ $maker['admin']['id']}}">{{ preg_replace('@\x{FFFD}@u', 'î',($maker['summary_title']))}}</a>
                        </li>
                        @else
                        {{ preg_replace('@\x{FFFD}@u', 'î',($maker['summary_title']))}}
                        @endif

                        @endif
                        @if(array_key_exists('role', $maker['@link']))
                        @foreach($maker['@link']['role'] as $role)
                        {{ preg_replace('@\x{FFFD}@u', 'î',(ucfirst($role['value'])))}}
                        @endforeach
                        @endif
                        </li>
                        @endforeach
            </ul>
            @if(array_key_exists('note', $record['_source']['lifecycle']['creation'][0]))
                <h3>Note</h3>
                @foreach($record['_source']['lifecycle']['creation'][0]['note'] as $note)
                    <p>
                        {{ ucfirst($note['value']) }}
                    </p>
                @endforeach
            @endif
        @endif


        @if(array_key_exists('places', $record['_source']['lifecycle']['creation'][0]))
            <h3>Place(s) associated</h3>
            <ul>
                @foreach($record['_source']['lifecycle']['creation'][0]['places'] as $place)
                    <li>{{ preg_replace('@\x{FFFD}@u', 'î', $place['summary_title']) }}</li>
                @endforeach
            </ul>
        @endif
    @endif


@endif
