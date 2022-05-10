<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100 ">
        <div class="card-body">
            <div class="contents-label mb-3">
                <h3>
                    {{ $profile['display_name'] }}
                </h3>
                <p>
                    {{ $profile['job_title']}}<br/>
                    Telephone: {{ $profile['telephone_number']}}<br/>
                    Email: <a href="mailto:{{ $profile['email_address']}}">{{ $profile['email_address']}}</a>
                </p>
            </div>
        </div>
    </div>
</div>
