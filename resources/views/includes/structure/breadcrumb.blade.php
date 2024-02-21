<div class="{{ isset($class) ? $class : 'col-md-12 shadow-sm p-3 mx-auto mb-3' }}">
    @if(!empty($page))
        @include('components.breadcrumbs')
    @else
        {{ Breadcrumbs::render() }}
    @endif
</div>
