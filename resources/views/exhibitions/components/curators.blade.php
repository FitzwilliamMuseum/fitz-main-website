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
@if(!empty($exhibition['associated_curators']) || !empty($exhibition['external_curators']))
    <div class="container-fluid related">
        <div class="container related-container">
            @if(!empty($heading))
                <h2 class="related-title text-center">{{ $heading }}</h2>
            @endif
            <div class="related-grid">
                @if(!empty($associated_curators))
                    @foreach($associated_curators as $a_curator)
                        @php
                            $a_curator = $a_curator['staff_profiles_id']
                        @endphp

                        @if(!empty($a_curator))

                            @include('exhibitions.components.curator-card', 
                            ['curator' => array(
                                'curator_type_slug' => 'about-us/our-staff',
                                'slug' => !empty($a_curator['slug'])? $a_curator['slug'] : '',
                                'profile_image' => !empty($a_curator['profile_image'])? $a_curator['profile_image'] : '',
                                'display_name' => !empty($a_curator['display_name'])? $a_curator['display_name'] : '',
                                'lastname' => !empty($a_curator['last_name'])? $a_curator['last_name'] : '',
                                'role' => !empty($a_curator['job_title']) ? $a_curator['job_title'] : '',
                                )
                            ])
                            
                        @endif
                    @endforeach
                @endif
                @if(!empty($external_curators))
                    {{-- {{ dd($external_curators) }} --}}
                    @foreach($external_curators as $e_curator)
                        @php
                            $e_curator = $e_curator['associated_people_id']
                        @endphp
                        @if(!is_null($e_curator))
                            @include('exhibitions.components.curator-card', 
                            ['curator' => array(
                                'curator_type_slug' => 'research/external-curators',
                                'slug' => !empty($e_curator['slug']) ? $e_curator['slug'] : '',
                                'profile_image' => !empty($e_curator['profile_image']) ? $e_curator['profile_image'] : '',
                                'display_name' => !empty($e_curator['display_name']) ? $e_curator['display_name'] : '',
                                'role' => !empty($e_curator['associated_role']) ? $e_curator['associated_role'] : '',
                                )
                            ])
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif