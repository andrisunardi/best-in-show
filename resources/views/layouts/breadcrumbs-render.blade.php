@unless ($breadcrumbs->isEmpty())
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!is_null($breadcrumb->url) && !$loop->last)
            <li class="breadcrumb-item active" aria-current="page">
                <span class="{{ $breadcrumb->icon }} fa-fw"></span>
                <a draggable="false" href="{{ $breadcrumb->url }}" class="text-decoration-none">
                    {{ $breadcrumb->title }}
                </a>
            </li>
        @else
            <li class="breadcrumb-item">
                <span class="{{ $breadcrumb->icon }} fa-fw"></span>
                {{ $breadcrumb->title }}
            </li>
        @endif
    @endforeach
@endunless
