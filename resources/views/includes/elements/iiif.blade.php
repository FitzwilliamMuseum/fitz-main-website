@if(array_key_exists('multimedia',$record['_source']))
@php
$con = array();
foreach ($record['_source']['multimedia'] as $image ){
  if(Arr::has($image, 'processed.zoom')) {
    $con[] = array(
      'zoom' => Arr::has($image, 'processed.zoom'),
      'image' => $image['admin']['id']
    );
  }
}
@endphp


@foreach($record['_source']['identifier'] as $id)
  @if(!empty($con))
    @if(Arr::get($con, 'zoom', true))
      @if(array_key_exists('type', $id))
        @if($id['type'] === 'priref')
          <div class="embed-responsive embed-responsive-1by1">
            <iframe src="{{ env('COLLECTION_URL') }}/uv.html#?manifest=https://api.fitz.ms/data-distributor/iiif/object-{{ $id['value']}}/manifest&c=0&m=0&cv=0&config=https://collection.beta.fitz.ms/config.json&locales=en-GB:English (GB),cy-GB:Cymraeg,fr-FR:Français (FR),sv-SE:Svenska,xx-XX:English (GB) (xx-XX)&xywh=-2139,-341,9925,5028&r=0"
            class="embed-item-responsive" allowfullscreen frameborder="0"></iframe>
          </div>
        @endif
      @endif
    @endif
  @endif
@endforeach
@endif
