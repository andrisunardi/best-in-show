<header>
    <nav class="navbar navbar-expand-md bg-body-tertiary fixed-top border-bottom">
        <div class="container-fluid">
            <a draggable="false" class="navbar-brand" href="{{ route('index') }}">
                <img draggable="false" class="d-inline-block align-text-top" height="24"
                    src="{{ asset('images/favicon.png') }}" alt="{{ trans('index.logo') }} - {{ env('APP_TITLE') }}">
                {{ env('APP_NAME') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a draggable="false" class="nav-link {{ Route::is('index') ? 'active' : null }}"
                            aria-current="page" href="{{ route('index') }}">
                            <span class="fas fa-home fa-fw"></span>
                            {{ trans('index.home') }}
                        </a>
                    </li>

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
                            <span class="fas fa-language fa-fw"></span>
                            @if (App::isLocale('en'))
                                {{ trans('index.english') }}
                            @else
                                {{ trans('index.indonesia') }}
                            @endif
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a draggable="false" class="dropdown-item"
                                    href="{{ route('locale', ['locale' => 'en']) }}">
                                    <span class="fas fa-flag fa-fw"></span>
                                    {{ trans('index.english') }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" class="dropdown-item"
                                    href="{{ route('locale', ['locale' => 'id']) }}">
                                    <span class="fas fa-flag fa-fw"></span>
                                    {{ trans('index.indonesia') }}
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a draggable="false" class="nav-link" href="https://www.diw.co.id" target="_blank">
                            <span class="fas fa-building fa-fw"></span>
                            DIW.co.id
                            <span class="fas fa-external-link fa-fw"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a draggable="false" class="nav-link" href="https://www.andrisunardi.com" target="_blank">
                            <span class="fas fa-user fa-fw"></span>
                            Andri Sunardi
                            <span class="fas fa-external-link fa-fw"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
