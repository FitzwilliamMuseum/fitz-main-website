@php
    if(!empty($exhibition['associated_curators'])) {
        $associated_curators = $exhibition['associated_curators'];
    }
    if(!empty($exhibition['external_curators'])) {
        $external_curators = $exhibition['external_curators'];
    }
    if(!empty($exhibition['curators_section_heading'])) {
        $heading = $exhibition['curators_section_heading'];
    }
@endphp

<div class="container-fluid related">
    <div class="container related-container">
        @if(isset($heading))
            <h2 class="related-title text-center">{{ $heading }}</h2>
        @endif
        <div class="related-grid">
            @if(isset($associated_curators))
                {{-- @foreach($associated_curators as $a_curator)
                    @php
                        $a_curator = $a_curator['staff_profiles_id']
                    @endphp

                    @if(!is_null($a_curator))

                        @include('exhibitions.components.curator-card', 
                        ['curator' => array(
                            'slug' => $a_curator['slug'],
                            'profile_image' => $a_curator['profile_image'],
                            'firstname' => $a_curator['first_name'],
                            'lastname' => $a_curator['last_name'],
                            'role' => !is_null($a_curator['job_title']) ? $a_curator['job_title'] : '',
                            )
                        ])
                        
                    @endif
                @endforeach --}}
            @endif
            @if(isset($external_curators))
                {{ dd($external_curators) }}
                {{-- @foreach($external_curators as $e_curator)
                    @php
                        $e_curator = $e_curator['associated_people_id']
                    @endphp
                    @if(!is_null($a_curator))
                        @include('exhibitions.components.curator-card', 
                        ['curator' => array(
                            'slug' => $e_curator['slug'],
                            'profile_image' => $e_curator['profile_image'],
                            'firstname' => $e_curator['firstname'],
                            'lastname' => $e_curator['lastname'],
                            'role' => $e_curator['associated_role'],
                            )
                        ])
                    @endif
                @endforeach --}}
            @endif
        </div>
    </div>
</div>