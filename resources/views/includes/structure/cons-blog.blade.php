<div class="container">
  <h3>Latest blog posts</h3>
  <div class="row">
    @foreach($blog as $post)
      <x-wordpress-card
      :url="$post['url']"
      :title="$post['title']"
      :image="$post['image']"
      />
      @endforeach
    </div>
</div>
