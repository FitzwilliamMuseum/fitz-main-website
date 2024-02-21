<div class="{{ isset($class) ? $class : 'col-md-12 shadow-sm p-3 mx-auto mb-3' }}">
    {{-- When a page is available, use the page title and url as the breadcrumb content --}}
    {{-- This change was requested to preserve the case of each page title (i.e Support us rather than Support Us) --}}
    @if(!empty($page))
        @include('components.breadcrumbs')
    @else
        {{ Breadcrumbs::render() }}
    @endif
</div>
