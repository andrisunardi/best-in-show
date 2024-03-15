<div>
    <div id="overlay" style="display: none;"></div>
    <div id="sidemenu" style="right: -100%;">
        <div class="p-4">
            <button type="button" id="sidemenu-close">
                <i>close</i>
            </button>
            <div class="clear-both"></div>

            <ul class="sidemenu-list">
                @foreach ($pets as $pet)
                    <li>
                        {{-- <a draggable="false" class="uppercase" href="{{ route('pet.view', ['slug' => $pet->slug]) }}"> --}}
                        <a draggable="false" class="uppercase" href="{{ route('product.index') }}">
                            {{ $pet->translate_name }}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('product.index') }}">
                        {{ trans('index.product') }}
                    </a>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('event.index') }}">
                        {{ trans('index.event') }}
                    </a>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('promotion.index') }}">
                        {{ trans('index.promotion') }}
                    </a>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('article.index') }}">
                        {{ trans('index.article') }}
                    </a>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('about-us') }}">
                        {{ trans('index.about_us') }}
                    </a>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('contact-us') }}">
                        {{ trans('index.contact_us') }}
                    </a>
                </li>
                <li>
                    <div class="lang-selector">
                        <a draggable="false" href="{{ route('locale', ['locale' => 'id']) }}"
                            class="{{ App::isLocale('en') ? null : 'active' }}">
                            ID
                        </a>
                        <span>/</span>
                        <a draggable="false" href="{{ route('locale', ['locale' => 'en']) }}"
                            class="{{ App::isLocale('en') ? 'active' : null }}">
                            EN
                        </a>
                    </div>
                </li>
            </ul>

            <form class="navbar-form">
                <div class="form-group">
                    <div class="icon-placeholder">
                        <i class="material-icons rounded-icon">search</i>
                    </div>
                    <input type="text"
                        placeholder="{{ trans('index.search') }} {{ trans('index.product') }} {{ trans('index.here') }}" />
                </div>
            </form>
        </div>
    </div>

    <header>
        <div class="top-accent"></div>

        <div class="header-container">
            <div class="header-wrapper">
                <div class="hidden lg:block w-2/6">&nbsp;</div>
                <div class="lg:w-4/6">
                    <a draggable="false" href="{{ route('index') }}">
                        <img draggable="false" src="{{ asset('assets/images/logo/bis-logo.webp') }}"
                            alt="{{ trans('index.logo') }} - {{ env('APP_TITLE') }}" />
                    </a>
                </div>

                <div class="hidden lg:block w-2/6">
                    <form class="navbar-form">
                        <div class="flex items-center gap-4">
                            <div class="lang-selector">
                                <a draggable="false" href="{{ route('locale', ['locale' => 'id']) }}"
                                    class="{{ App::isLocale('en') ? null : 'active' }}">
                                    ID
                                </a>
                                <span>/</span>
                                <a draggable="false" href="{{ route('locale', ['locale' => 'en']) }}"
                                    class="{{ App::isLocale('en') ? 'active' : null }}">
                                    EN
                                </a>
                            </div>
                            <div class="form-group">
                                <div class="icon-placeholder">
                                    <i class="material-icons rounded-icon">search</i>
                                </div>
                                <input type="text"
                                    placeholder="{{ trans('index.search') }} {{ trans('index.product') }} {{ trans('index.here') }}" />
                            </div>
                        </div>
                    </form>
                    <div class="clear-both"></div>
                </div>

                <div class="block lg:hidden">
                    <button type="button" id="hamburger-button">
                        <i>menu</i>
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden lg:block mt-7">
            <ul class="menu-list">
                @foreach ($pets as $pet)
                    <li>
                        {{-- <a draggable="false" class="uppercase" href="{{ route('pet.view', ['slug' => $pet->slug]) }}"> --}}
                        <a draggable="false" class="uppercase" href="{{ route('product.index') }}">
                            {{ $pet->translate_name }}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('product.index') }}">
                        {{ trans('index.product') }}
                    </a>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('event.index') }}">
                        {{ trans('index.event') }}
                    </a>
                </li>
                <li class="dropdown" style="z-index: 1">
                    <a draggable="false" href="javsacript:;" class="dropdown-trigger uppercase">
                        {{ trans('index.others') }}
                    </a>
                    <div class="dropdown-content">
                        <a draggable="false" class="uppercase" href="{{ route('promotion.index') }}">
                            {{ trans('index.promotion') }}
                        </a>
                        <a draggable="false" class="uppercase" href="{{ route('article.index') }}">
                            {{ trans('index.article') }}
                        </a>
                    </div>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('about-us') }}">
                        {{ trans('index.about_us') }}
                    </a>
                </li>
                <li>
                    <a draggable="false" class="uppercase" href="{{ route('contact-us') }}">
                        {{ trans('index.contact_us') }}
                    </a>
                </li>
            </ul>
        </div>
    </header>
</div>
