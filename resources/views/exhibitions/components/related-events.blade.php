@if(!empty($component['related_events']) || !empty($related_events))
@php
    if(empty($related_events)) {
        $related_events = $component['related_events'][0];
    }
@endphp
<div class="related-events">
    @if(!empty($related_events['heading']))
        <h3 class="related-events-title">{{ $related_events['heading'] }}</h3>
    @endif
    @if(!empty($related_events['events_listing']))
        <div class="related-events-wrapper">
            @foreach($related_events['events_listing'] as $event)
                <article class="support-cta related-event-cta">
                    @if(!empty($event['image_id']))
                        @php
                            if(!empty($exhibition['exhibition_files'])) {
                                $image_source = $exhibition['exhibition_files'];
                            }

                            foreach($image_source as $image_block) {
                                if(!empty($image_block['directus_files_id'])) {
                                    $image_block['asset_id'] = $image_block['directus_files_id'];
                                }
                                if($image_block['asset_id']['id'] == $event['image_id']) {
                                    $image_asset = $image_block['asset_id'];
                                }
                            }
                        @endphp
                        <div class="related-event-img">
                            @if(!empty($image_asset))
                                <img src="{{ $image_asset['data']['url'] }}" alt="{{ !empty($image_asset['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">
                            @else
                                <img
                                    src="{{ env('MISSING_IMAGE_URL') }}"
                                    load="lazy" alt="">
                            @endif
                        </div>
                    @else
                        <div class="related-event-img">
                            <img
                                src="{{ env('MISSING_IMAGE_URL') }}"
                                load="lazy" alt="">
                        </div>
                    @endif
                    <div class="related-event-wrapper">
                        @if(!empty($event['heading']))
                            <h4 class="cta-title">{{ $event['heading'] }}</h4>
                        @endif
                        @if(!empty($event['event_date']))
                            <h5 class="cta-title-date">{{ $event['event_date'] }}</h5>
                        @endif
                        @if(!empty($event['excerpt']))
                            <p class="cta-copy">
                                {{ $event['excerpt'] }}
                            </p>
                        @endif
                        @php
                            $event_item = array(
                                'url' => ''
                            );

                            if(!empty($event['exhibition_id'])) {
                                if(!empty($exhibition['related_exhibitions'])) {
                                    foreach($exhibition['related_exhibitions'] as $related_exhibition) {
                                        $related_exhibition = $related_exhibition['related_exhibition_id'];
                                        if($related_exhibition['id'] == $event['exhibition_id']) {
                                            $event_item['url'] = $related_exhibition['slug'];
                                        }
                                    }
                                }
                            } elseif(!empty($event['link_url'])) {
                                $event_item['url'] = $event['link_url'];
                            }
                        @endphp
                        @if(!empty($event['link_text']))
                            <a href="{{ $event_item['url'] }}" class="cta-btn">
                                {{ $event['link_text'] }}
                                @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                            </a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</div>
@endif
