<div class="component-list mx-auto col-max-800">
    <h2 class="list-title">{{ !empty($title) ? $title : '' }}</h2>
    @if (!empty($ordered) && $ordered)
    <ol class="o-list">
        @if(!empty($items))
            @foreach($items as $item)
                <li class="item">{{ $item }}</li>
            @endforeach
        @endif
    </ol>
    <p class="info">{{ !empty($info) ? $info : '' }}</p>
    <p class="additional-info">{{ !empty($additional_info) ? $additional_info : '' }}</p>
    @else
    <ul class="u-list">
        @if(!empty($items))
            @foreach($items as $item)
                <li class="item">{{ $item }}</li>
            @endforeach
        @endif
    </ul>
    <p class="info">{{ !empty($info) ? $info : '' }}</p>
    <p class="additional-info">{{ !empty($additional_info) ? $additional_info : '' }}</p>
    @endif
</div>
