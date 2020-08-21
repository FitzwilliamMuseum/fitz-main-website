<div class="container">
  <h3>Latest related blog posts</h3>
  <div class="row">
    @foreach($blog as $post)
      <div class="col-md-4 mb-3">
        <div class="card  h-100">
          <a href="{{ $post['url'][0] }}"><img class="img-fluid" src="{{ $post['searchImage'][0]}}"
            alt="A stand in image for this post"
            loading="lazy"/></a>
            <div class="card-body h-100">
              <div class="contents-label mb-3">
                <h3>
                  <a href="{{ $post['url'][0] }}">{{ $post['title'][0]}}</a>
                </h3>
                <p>{{  Carbon\Carbon::parse($post['pubDate'][0])->format('l j F Y') }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
</div>
