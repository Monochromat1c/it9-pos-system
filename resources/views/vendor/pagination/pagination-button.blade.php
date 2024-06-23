@if ($paginator->hasPages())
    <nav class="pagination display-flex align-items-center">
        <ul class="pagination  display-flex">
            {{-- First Page Link --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->url(1) }}"
                    aria-label="@lang('pagination.first')">&laquo;</a>
            </li>

            {{-- Previous Page Link --}}
            <li class=" margin-left-half page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>

            {{-- Dropdown List of Pages --}}
            <li class="margin-top-auto margin-bottom-auto margin-left-half margin-right-half">
                <select class="padding-half border-radius-large" aria-label="Page Select" onchange="window.location.href = this.value;" style="font-size: 1.6rem;">
                    @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                        <option class="padding-1" style="font-size: 1.6rem;" value="{{ $paginator->url($page) }}" {{ $paginator->currentPage() == $page ? 'selected' : '' }}>
                            Page {{ $page }}
                        </option>@if ($paginator->hasPages())
    <nav class="pagination display-flex align-items-center">
        <ul class="pagination  display-flex">
            {{-- First Page Link --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->url(1) }}"
                    aria-label="@lang('pagination.first')">&laquo;</a>
            </li>

            {{-- Previous Page Link --}}
            <li class=" margin-left-half page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>

            {{-- Dropdown List of Pages --}}
            <li class="margin-top-auto margin-bottom-auto margin-left-half margin-right-half">
                <select class="padding-half border-radius-large" aria-label="Page Select" onchange="window.location.href = this.value;" style="font-size: 1.6rem;">
                    @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                        <option class="padding-1" style="font-size: 1.6rem;" value="{{ $paginator->url($page) }}" {{ $paginator->currentPage() == $page ? 'selected' : '' }}>
                            Page {{ $page }}
                        </option>
                    @endfor
                </select>
            </li>

            {{-- Next Page Link --}}
            <li class="margin-right-half page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>

            {{-- Last Page Link --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->url($paginator->lastPage()) }}"
                    aria-label="@lang('pagination.last')">&raquo;</a>
            </li>
        </ul>
    </nav>
@endif
                    @endfor
                </select>
            </li>

            {{-- Next Page Link --}}
            <li class="margin-right-half page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>

            {{-- Last Page Link --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="text-hover-white text-color-black" style="font-size: 3.5rem;" href="{{ $paginator->url($paginator->lastPage()) }}"
                    aria-label="@lang('pagination.last')">&raquo;</a>
            </li>
        </ul>
    </nav>
@endif