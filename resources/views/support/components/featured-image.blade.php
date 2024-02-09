
@php
    if(!empty($component['image'][0]['image_block_id'])) {
        if(!empty($page['image_blocks'])) {
            foreach($page['image_blocks'] as $image_block) {
                if($image_block['asset_id']['id'] == $component['image'][0]['image_block_id']) {
                    $image_asset = $image_block['asset_id'];
                }
            } 
        }
    }
    if(!empty($component['image'][0]['image_caption'])) {
        $caption = $component['image'][0]['image_caption'];
    }
@endphp
<figure class="container featured_image">
    @if(!empty($image_asset))
        <img src="{{ $image_asset['data']['url'] }}" alt="{{ !empty($image_asset['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">
    @else
        <img src="https://s3-alpha-sig.figma.com/img/9b5c/a213/5f4121d542313bc48aaacd188c7011a5?Expires=1707696000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=D9Xr-K7JHd5b6igceO5jBy~Iodb7xNux8u9ckq61spUlZ-XnHcWd3sC~J6WeOnfXb-HhwryBtBnI4nQxcZPMM-IyDkCG1uzsnzNA~DIUI8LBaviKvVWD15YdfxKr7DUHy-knKHhqo9aO3ra2uvPTNZgTM5Z1wHtJF1jBAoMGOuHZ0rdLvwlDYnXZhda74EOdvKLeCkAzCRSNAz7GZpjvqH7eF4UCPmqajb83QOzFiyJ7EUUSfcRzmUlvIpPcZcpHfu3or8-yL8zT9G5qJa4xdUJ7sTcRNgx-YC46O17Vt2KV6ax5BGyahNxahrC~r4Y7SuRpHrWQ0AvC22O~fV2uCg__" load="lazy" alt="">
    @endif
    <figcaption>{{ !empty($caption) ? $caption : '' }}{{ $caption }}</figcaption>
</figure>