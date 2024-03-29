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
          <div class="ratio ratio-1x1">
            <iframe src="{{ env('COLLECTION_URL') }}/uv.html#?manifest=https://api.fitz.ms/data-distributor/iiif/object-{{ $id['value']}}/manifest&c=0&m=0&cv=0&config={{ env('COLLECTION_URL') }}/config.json&locales=en-GB:English (GB),cy-GB:Cymraeg,fr-FR:Français (FR),sv-SE:Svenska,xx-XX:English (GB) (xx-XX)&xywh=0,0,0,0&r=0"
            allowfullscreen ></iframe>
          </div>
        @endif
      @endif
    @endif
  @endif
@endforeach
@endif
