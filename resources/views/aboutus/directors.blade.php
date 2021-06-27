@extends('layouts.layout')
@section('title', 'Our directors')
@section('hero_image',env('CONTENT_STORE') . '1024px-picture_of_sidney_colvin.jpg')
@section('hero_image_title', 'A portrait of Sidney Colvin')
@section('description', 'A list and timeline of our directors')
@section('keywords', 'directors,timeline,museum,cambridge,fitzwilliam')
@section('content')
  <h2 class="lead">
    Our directors
  </h2>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date from</th>
          <th scope="col">Date to</th>
          <th scope="col">Director</th>
        </tr>
      </thead>
      <tbody>
        @foreach($directors['data'] as $director)
        <tr>
          <td>{{ $director['date_from'] }}</td>
          <td>{{ $director['date_to'] }}</td>
          <td><a href="{{ route('director',[$director['slug']] ) }}">{{ $director['display_name'] }}</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </div>
@endsection

@section('timeline')
<h2 class="lead">Our Directors - a timeline</h2>
<div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
  <section class="cd-horizontal-timeline">
  	<div class="timeline">
  		<div class="events-wrapper">
  			<div class="events">
  				<ol>
            @foreach($directors['data'] as $director)
  					<li><a href="#0" data-date="01/01/{{$director['date_from']}}" class="">{{ $director['date_from']}}</a></li>
            @endforeach
  				</ol>

  				<span class="filling-line" aria-hidden="true"></span>
  			</div> <!-- .events -->
  		</div> <!-- .events-wrapper -->

  		<ul class="cd-timeline-navigation">
  			<li><a href="#0" class="prev inactive">Prev</a></li>
  			<li><a href="#0" class="next">Next</a></li>
  		</ul> <!-- .cd-timeline-navigation -->
  	</div> <!-- .timeline -->

  	<div class="events-content">
  		<ol>
        <li data-date="01/01/1800" class="selected">
  				<h2 class="lead">{{$directors['data']['0']['display_name']}}</h2>
  				@if(!is_null($directors['data']['0']['biography']))
          @markdown($directors['data']['0']['biography'])
          @endif
  			</li>
        @foreach($directors['data'] as $director)
  			<li data-date="01/01/{{$director['date_from']}}">
  				<h2 class="lead">{{$director['display_name']}}</h2>
          @if(!is_null($director['biography']))
          @markdown($director['biography'])
          @endif
  			</li>
        @endforeach
  		</ol>
  	</div> <!-- .events-content -->
  </section>
</div>
@endsection
