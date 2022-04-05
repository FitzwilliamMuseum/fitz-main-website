<div class="container-fluid py-3">
    <div class="container">
        <div class=" py-3 bg-white">
            <p>Nationality: {{$artist[0]['nationality'] ?? 'Not known'}}</p>
            <p>{{$artist[0]['year_of_birth']}} - {{$artist[0]['year_of_death']}}</p>
            @markdown($artist[0]['biography'])
        </div>
    </div>
</div>
