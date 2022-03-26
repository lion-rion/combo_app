@if ($paginator->hasPages())
<div class="paginationWrap">
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <p class="pagination_none_1"></p>        
        @else
            <li>
                <a class="pagination_a" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa-solid fa-angle-left pagination_button"></i></a>
            </li>
        @endif

        <!--{{$paginator->currentPage()}}←現在のページ数と{{$paginator->lastPage()}}を使ってページネーターを構成-->
        <p class="pagination_p">{{$paginator->currentPage()}} / {{$paginator->lastPage()}}</p>


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="pagination_a" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa-solid fa-angle-right pagination_button"></i></a>
            </li>
        @else
            <p class="pagination_none_2"></p>
        @endif
    </ul>
</div>
@endif