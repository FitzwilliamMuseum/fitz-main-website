<div class="container">
    <h2>Latest blog posts</h2>
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
