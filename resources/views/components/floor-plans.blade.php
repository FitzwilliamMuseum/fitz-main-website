<ul class="floor-plans">
@foreach($floorplans as $plan)
    <li>
        <a href="{{ $plan['file']['data']['full_url'] }}" title="{{ $plan['title'] }}">{{ $plan['title'] }}</a>
    </li>
@endforeach
</ul>
