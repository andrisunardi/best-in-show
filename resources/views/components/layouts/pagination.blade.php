@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ trans('index.previous') }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a draggable="false" class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            wire:navigate>
                            {{ trans('index.previous') }}
                        </a>
                    </li>
                @endif

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a draggable="false" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            wire:navigate>
                            {{ trans('index.next') }}
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ trans('index.next') }}</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {{ trans('index.showing') }}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {{ trans('index.to') }}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {{ trans('index.of') }}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {{ trans('index.results') }}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="{{ trans('index.previous') }}">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a draggable="false" class="page-link" wire:navigate
                                href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="{{ trans('index.previous') }}">
                                &lsaquo;
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a draggable="false" class="page-link" href="{{ $url }}"
                                            wire:navigate>
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a draggable="false" class="page-link" href="{{ $paginator->nextPageUrl() }}"
                                rel="next" aria-label="{{ trans('index.next') }}" wire:navigate>
                                &rsaquo;
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="{{ trans('index.next') }}">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
