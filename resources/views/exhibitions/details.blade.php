@extends('layouts/exhibitions')

@foreach($exhibitions['data'] as $coll)
    @section('keywords', $coll['meta_keywords'])
    @section('description', $coll['meta_description'])
    @section('title', $coll['exhibition_title'])
    @section('hero_image', $coll['hero_image']['data']['full_url'])
    @section('hero_image_title', $coll['hero_image_alt_text'])

    @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      @markdown($coll['exhibition_narrative'])
      @if(isset($coll['exhibition_abstract']))
        @markdown($coll['exhibition_abstract'])
      @endif
    </div>

    @if( isset($coll['exhibition_url']) || isset($coll['exhibition_start_date']))
    <h3>Exhibition details</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      <ul>
        @if(isset($coll['exhibition_url']))
          <li>
            <a href="$coll['exhibition_url']">Exhibition website</a>
          </li>
        @endif
        @if(isset($coll['exhibition_start_date']))
          <li>
            Exhibition run: {{  Carbon\Carbon::parse($coll['exhibition_start_date'])->format('l dS F Y') }} to
            {{  Carbon\Carbon::parse($coll['exhibition_end_date'])->format('l dS F Y') }}
          </li>
        @endif
      </ul>
    </div>
    @endif

    @if(!empty($coll['exhibition_files']))
    <h3>Exhibition files</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      <ul>
        @foreach($coll['exhibition_files'] as $file)
          <li>
            <a href="{{ $file['directus_files_id']['data']['full_url'] }}">{{ $file['directus_files_id']['title'] }}</a>
          </li>
        @endforeach
      </ul>
    </div>
    @endif

    @if(isset($coll['youtube_id']))
      <h3>
        Exhibition film
      </h3>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" title="A film related to {{ $coll['exhibition_title'] }}"
            loading="lazy"
            src="https://www.youtube.com/embed/{{$coll['youtube_id']}}" frameborder="0"
            allowfullscreen></iframe>
          </div>
        </div>
      @endif
    @endsection

    <!-- Start of associated curators block -->
    @if(!empty($coll['associated_curators']))
      @section('curators')
        <div class="container">
          <h3>Associated curators</h3>
          <div class="row">
            @foreach($coll['associated_curators'] as $curator)
            <div class="col-md-4 mb-3">
              <div class="card card-body h-100">
                @if(!is_null($curator['staff_profiles_id']['profile_image']))
                  <img class="img-fluid" src="{{ $curator['staff_profiles_id']['profile_image']['data']['thumbnails'][7]['url']}}"
                  loading="lazy"
                  alt="{{ $curator['staff_profiles_id']['profile_image_alt_text'] }}"
                  height="{{ $curator['staff_profiles_id']['profile_image']['data']['thumbnails'][7]['height'] }}"
                  width="{{ $curator['staff_profiles_id']['profile_image']['data']['thumbnails'][7]['width'] }}"
                  />
                @endif
                <div class="container h-100">
                  <div class="contents-label mb-3">
                    <h3>
                      <a href="/research/staff-profiles/{{ $curator['staff_profiles_id']['slug']}}">{{ $curator['staff_profiles_id']['display_name']}}</a>
                    </h3>
                  </div>
                </div>
                <a href="/research/staff-profiles/{{ $curator['staff_profiles_id']['slug']}}" class="btn btn-dark">Read more</a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      @endsection
    @endif
    <!-- End of assoociated curators -->

    @if(!empty($coll['exhibition_partners'] ))
      @section('research-funders')
        <div class="container">
          <h3>Funders and partners</h3>
          <div class="row">
            @foreach($coll['exhibition_partners'] as $partner)
            <div class="col-md-4 mb-3">
              <div class="card card-body h-100">
                @if(!is_null( $partner['partner']['partner_logo']))
                  <img class="img-fluid" src="{{ $partner['partner']['partner_logo']['data']['thumbnails'][4]['url']}}"
                  alt="Logo for {{ $partner['partner']['partner_full_name']}}"
                  height="{{ $partner['partner']['partner_logo']['data']['thumbnails'][4]['height'] }}"
                  width="{{ $partner['partner']['partner_logo']['data']['thumbnails'][4]['width'] }}"
                  loading="lazy"/>
                @else
                  <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                  alt="The Fitzwilliam Museum's Gallery 3 roof"
                  loading="lazy"/>
                @endif
                <div class="container h-100">
                  <div class="contents-label mb-3">
                    <h3>
                      <a href="{{ $partner['partner']['partner_url']}}">{{ $partner['partner']['partner_full_name']}}</a>
                    </h3>
                    <p>{{ $partner['partner']['partner_type'][0]}}</p>
                  </div>
                </div>

                <a href="{{ $partner['partner']['partner_url']}}" class="btn btn-dark">Read more</a>
              </div>

            </div>
            @endforeach
          </div>
        </div>
      @endsection
    @endif

    <!-- Associated departments block -->
    @if(!empty($coll['associated_departments']))
      @section('departments')
        <div class="container">
          <h3>Associated departments</h3>
          <div class="row">
            @foreach($coll['associated_departments'] as $gallery)
            <div class="col-md-4 mb-3">
              <div class="card card-body h-100">
                @if(!is_null($gallery['departments_id']['hero_image']))
                <img class="img-fluid" src="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['url']}}"
                loading="lazy" alt="Highlight image for {{ gallery['departments_id']['hero_image_alt_text'] }}"
                height="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
                width="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
                />
                @endif
                <div class="container h-100">
                  <div class="contents-label mb-3">
                    <h3>
                      <a href="/departments/{{ $gallery['departments_id']['slug']}}">{{ $gallery['departments_id']['title']}}</a>
                    </h3>
                  </div>
                </div>
                <a href="/departments/{{ $gallery['departments_id']['slug']}}" class="btn btn-dark">Read more</a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      @endsection
    @endif
    <!-- end of associated departments block -->

    <!-- Start of associate galleries block -->
    @if(!empty($coll['associated_galleries']))
    @section('galleries')
      <div class="container">
        <h3>Associated Galleries</h3>
        <div class="row">
          @foreach($coll['associated_galleries'] as $gallery)
          <div class="col-md-4 mb-3">
            <div class="card card-body h-100">
              @if(!is_null($gallery['galleries_id']['hero_image']))
              <img class="img-fluid" src="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['url']}}" loading="lazy"
              alt="A highlight image of {{ $gallery['galleries_id']['hero_image_alt_text'] }}"
              height="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
              width="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
              />
              @endif
              <div class="container h-100">
                <div class="contents-label mb-3">
                  <h3>
                    <a href="/galleries/{{ $gallery['galleries_id']['slug']}}">{{ $gallery['galleries_id']['gallery_name']}}</a>
                  </h3>
                </div>
              </div>
              <a href="/galleries/{{ $gallery['galleries_id']['slug']}}" class="btn btn-dark">Read more</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endsection
    @endif
    <!-- end of associated galleries block -->

    @section('360')
      @if(!empty($coll['image_360_pano']))
        <div class="container">
          <h3>360 gallery image</h3>
          <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
            <div id="panorama"></div>
          </div>
        </div>
        @section('360_image', $coll['image_360_pano']['data']['full_url']))
      @endif
    @endsection

@endforeach
