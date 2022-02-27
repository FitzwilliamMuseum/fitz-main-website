<div class="row">
    @dd($sessions)
    @foreach($sessions['data'] as $session)
        <x-family-video :session="$session"></x-family-video>
    @endforeach
</div>
