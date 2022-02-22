@if(Carbon\Carbon::parse($project['publication_date'])->diffInDays() > 120)
    <div class="alert alert-warning" role="alert">
        Please note that this news article is over 4 months old.
        Check with the museum before visiting if this refers to objects on display.
    </div>
@endif
