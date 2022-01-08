<h3>Creative inspiration, wellbeing and ideas for you at home</h3>
<div class="row">
  @foreach($sessions['data'] as $session)
    <x-image-card
    :route="'adult-activity'"
    :params="[$session['slug']]"
    :title="$session['title']"
    :image="$session['hero_image']"
    :altTag="$session['hero_image_alt_text']"
    />
  @endforeach
</div>
