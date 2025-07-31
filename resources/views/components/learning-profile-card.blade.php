<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                {{ $profile['display_name'] }}
            </h3>
            <p>
                {{ $profile['job_title'] }}<br />
                Telephone: {{ $profile['telephone_number'] }}<br />
                Email: <a href="mailto:{{ $profile['email_address'] }}">{{ $profile['email_address'] }}</a>
            </p>
        </div>
    </div>
</div>
