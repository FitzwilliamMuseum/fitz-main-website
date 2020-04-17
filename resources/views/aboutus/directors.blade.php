@extends('layouts/layout')
@section('title', 'Our directors')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/1024px-picture_of_sidney_colvin.jpg')
@section('hero_image_title', 'A portrait of Sidney Colvin')
@section('timeline')
<h2>Our Directors - a timeline</h2>
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">

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
  				<h2>{{$directors['data']['0']['display_name']}}</h2>
  				<p>
  					Bio here
  				</p>
  			</li>
        @foreach($directors['data'] as $director)
  			<li data-date="01/01/{{$director['date_from']}}">
  				<h2>{{$director['display_name']}}</h2>
  				<p>
  					Bio to go here with image
  				</p>
  			</li>
        @endforeach
  		</ol>
  	</div> <!-- .events-content -->
  </section>
</div>
@endsection
