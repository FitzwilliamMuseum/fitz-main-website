@if(isset($result['mimetype']))
    @if(!is_null($result['mimetype'] == 'application\pdf'))
        <p>
            <a href="{{$result['url'][0]}}">
                {{$result['url'][0]}}
            </a>
        </p>
    @else
        <p>
            <a href="{{URL::to('/')}}/{{$result['url'][0]}}">
                {{URL::to('/')}}/{{$result['url'][0]}}
            </a>
        </p>
    @endif
@endif
