@if ($paginator->hasPages())
  <h3 class="py-3">Browse through the cases</h3>
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between text-center my-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 mr-3 text-sm ">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ route('exhibition.labels', [request()->segment(3),str_replace('/?page=', 'case-',$paginator->previousPageUrl())]) }}" rel="prev" class="relative inline-flex items-center px-4 mr-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ route('exhibition.labels', [request()->segment(3),str_replace('/?page=', 'case-',$paginator->nextPageUrl())])}}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
