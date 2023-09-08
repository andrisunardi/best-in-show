<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top border-bottom">
        <div class="container-fluid">
            <div class="me-0 me-lg-2">
                <button type="button" data-bs-target="#sidebar" data-bs-toggle="collapse" class="btn btn-lg">
                    <span class="fas fa-list fa-fw"></span>
                </button>
            </div>

            <a draggable="false" class="navbar-brand" href="{{ route('cms.index') }}">
                <img draggable="false" class="d-inline-block align-text-top" height="30"
                    src="{{ asset('images/favicon.png') }}" alt="{{ trans('index.logo') }} - {{ env('APP_TITLE') }}">
                {{ env('APP_NAME') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="fas fa-palette fa-fw"></span>
                            {{ trans('index.theme') }}
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item" data-bs-theme-value="light">
                                    <span class="fas fa-sun fa-fw"></span>
                                    {{ trans('index.light') }}
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-theme-value="dark">
                                    <span class="fas fa-moon fa-fw"></span>
                                    {{ trans('index.dark') }}
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" data-bs-theme-value="auto">
                                    <span class="fas fa-circle-half-stroke fa-fw"></span>
                                    {{ trans('index.auto') }}
                                </button>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if (App::isLocale('en'))
                                <img draggable="false"class="me-1 rounded" width="30" height="20"
                                    src="{{ asset('images/flag/en.webp') }}"
                                    alt="{{ trans('index.flag') }}  - {{ trans('index.english') }} - {{ env('APP_TITLE') }}">
                                {{ trans('index.english') }}
                            @else
                                <img draggable="false" class="me-1 rounded" width="30" height="20"
                                    src="{{ asset('images/flag/id.webp') }}"
                                    alt="{{ trans('index.flag') }}  - {{ trans('index.indonesia') }} - {{ env('APP_TITLE') }}">
                                {{ trans('index.indonesia') }}
                            @endif
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a draggable="false" class="dropdown-item"
                                    href="{{ route('cms.locale', ['locale' => 'en']) }}">
                                    <img draggable="false" class="me-1 rounded" width="30" height="20"
                                        src="{{ asset('images/flag/en.webp') }}"
                                        alt="{{ trans('index.flag') }}  - {{ trans('index.english') }} - {{ env('APP_TITLE') }}">
                                    {{ trans('index.english') }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="dropdown-item"
                                    href="{{ route('cms.locale', ['locale' => 'id']) }}">
                                    <img draggable="false" class="me-1 rounded" width="30" height="20"
                                        src="{{ asset('images/flag/id.webp') }}"
                                        alt="{{ trans('index.flag') }}  - {{ trans('index.indonesia') }} - {{ env('APP_TITLE') }}">
                                    {{ trans('index.indonesia') }}
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img draggable="false" class="rounded-circle me-1" width="30" height="30"
                                src="{{ Auth::user()->assetImage() }}" alt="{{ Auth::user()->altImage() }}">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a draggable="false" class="dropdown-item" aria-current="page"
                                    href="{{ route('cms.profile.index') }}">
                                    <span class="fas fa-user fa-fw me-1"></span>
                                    {{ trans('index.profile') }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="dropdown-item" aria-current="page"
                                    href="{{ route('cms.profile.activity-log') }}">
                                    <span class="fas fa-user-clock fa-fw me-1"></span>
                                    {{ trans('index.activity_log') }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="dropdown-item" aria-current="page"
                                    href="{{ route('cms.profile.edit-profile') }}">
                                    <span class="fas fa-user-edit fa-fw me-1"></span>
                                    {{ trans('index.edit_profile') }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="dropdown-item" aria-current="page"
                                    href="{{ route('cms.profile.change-password') }}">
                                    <span class="fas fa-user-lock fa-fw me-1"></span>
                                    {{ trans('index.change_password') }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="dropdown-item" aria-current="page"
                                    href="{{ route('cms.logout') }}">
                                    <span class="fas fa-sign-out-alt fa-fw me-1"></span>
                                    {{ trans('index.logout') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
