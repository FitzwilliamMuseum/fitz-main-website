<div class="component-list mx-auto col-max-800">
    <h2 class="list-title">{{ isset($title) ? $title : '' }}</h2>
    @if (isset($ordered) && $ordered)
    <ol class="o-list">
        @foreach($items as $item)
            <li class="item">{{ $item }}</li>
        @endforeach
    </ol>
    <p class="info">{{ isset($info) ? $info : '' }}</p>
    <p class="additional-info">{{ isset($additional_info) ? $additional_info : '' }}</p>
    @else
    <ul class="u-list">
        @foreach($items as $item)
            <li class="item">{{ $item }}</li>
        @endforeach
    </ul>
    <p class="info">{{ isset($info) ? $info : '' }}</p>
    <p class="additional-info">{{ isset($additional_info) ? $additional_info : '' }}</p>
    @endif
</div>
