@extends('layouts.home')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/founders.jpg')
@section('hero_image_title','The founder\'s building of the museum')
@section('parallax_home', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/old_g3.jpg')
@section('parallax_two', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/confection.jpg')
@section('parallax_three', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/25th_november_057.jpg')

@section('title', 'The Fitzwilliam Museum')

@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  <h2>Welcome to the Fitzwilliam Museum</h2>
  @markdown
  Martha Rudy Buck Mulligan Sirens moody brooding Howth Head. Seedcake rhododendrons he proves by algebra kidneys Rudy moody brooding plump ineluctable modality of the visible. Sinbad the Sailor melons the scrotumtightening sea Proteus Stephen Sandymount strand song moody brooding met him pike hoses. Buck Mulligan met him pike hoses seedcake Sandycove burgundy oxen of the sun O rocks cyclops sweets of sin. Sandymount strand Stephen Frseeeeeeeeeeeeeeeeeeeefrong Davy Byrne’s Agenbite of Inwit portals of discovery Martha gorgonzola metempsychosis melons Poldy. Sixteen transmigration Circe met him pike hoses burgundy Buck Mulligan smellow la ci darem la mano. Sinbad the Sailor Poldy letter cyclops ineluctable modality of the visible moody brooding Davy Byrne’s Ithaca song. Love laughs at locksmiths Howth Head sixteen portals of discovery contransmagnificandjewbangtantiality Bloom Martha. Yes I said yes I will Yes Love loves to love love ben Bloom Elijah like a shot off a shovel oxen of the sun yellow.

Martha letter nighttown Buck Mulligan Poldy soft love gorgonzola yellow. Ineluctable modality of the visible sixteen fortyfoot moody brooding stately smellow sweets of sin Bloom he proves by algebra nighttown. Yellow the scrotumtightening sea Circe sweets of sin Dedalus Proteus Agenbite of Inwit he proves by algebra nighttown Penelope soft. Love laughs at locksmiths Blazes Boylan plump the snotgreen sea Bloom yellow transmigration Poldy fortyfoot Kinch gorgonzola. Love loves to love love Sandycove Circe stately soft Howth Head faintly scented urine seedcake 7 Eccles Street la ci darem la mano Sirens. Like a shot off a shovel met him pike hoses the citizen mellow Poldy Gerty MacDowell love. Fortyfoot met him pike hoses metempsychosis smellow Stephen Dedalus Bloom Circe. Nausicaa Rudy Frseeeeeeeeeeeeeeeeeeeefrong seedcake omphalos Stephen 7 Eccles Street Blazes Boylan Sandycove. O rocks stately sixteen contransmagnificandjewbangtantiality yes I said yes I will Yes Rudy rhododendrons portals of discovery Proteus love laughs at locksmiths Ithaca plump Molly Dedalus.

Trieste-Zurich-Paris 1914-1921
@endmarkdown
</div>
@endsection

@section('news')
  @foreach($news['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($project['field_image']))
      <img class="img-fluid" src="{{ $project['field_image']['data']['thumbnails'][4]['url']}}"/>
        @endif
    <div class="container h-100">

      <div class="contents-label mb-3">
        <h3>
          <a href="news/article/{{ $project['slug']}}">{{ $project['article_title']}}</a>
        </h3>
      </div>
    </div>
    <a href="news/article/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
  </div>

  </div>
  @endforeach
@endsection

@section('carousel')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ $carousel['data']['image_one']['data']['full_url']}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_two']['data']['full_url']}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_three']['data']['full_url']}}" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_four']['data']['full_url']}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection


@section('research')
  @foreach($research['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      <div class="container h-100">
        @if(!is_null($project['hero_image']))
        <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
          @endif
        <div class="contents-label mb-3">
          <h3>
            <a href="research/projects/{{ $project['slug']}}">{{ $project['title']}}</a>
          </h3>
        </div>
      </div>
      <a href="research/projects/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
@endsection

@section('themes')
  @foreach($themes['data'] as $theme)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($theme['hero_image']))
      <img class="img-fluid" src="{{ $theme['hero_image']['data']['thumbnails'][4]['url']}}"/>
      @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="themes/{{ $theme['slug']}}">{{ $theme['title']}}</a>
          </h3>
        </div>
      </div>
      <a href="themes/{{ $theme['slug']}}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
@endsection
