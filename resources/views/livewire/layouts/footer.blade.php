<footer>
    <div class="container">
        <div class="flexview-footer">
            <div class="footer-item">
                <h5>{{ trans('index.information') }}</h5>
                <ul class="footer-menu">
                    <li>
                        <a draggable="false" href="{{ env('LINK_WANT_TO_OPEN_A_PET_SHOP') }}" target="_blank">
                            @if (App::isLocale('en'))
                                Want to Open a Pet Shop
                            @else
                                Ingin Membuka Petshop
                            @endif
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ env('LINK_WANT_TO_OPEN_A_ONLINE_SHOP') }}" target="_blank">
                            @if (App::isLocale('en'))
                                Want to Open an Online Shop
                            @else
                                Ingin Membuka Onlineshop
                            @endif
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('contact-us') }}">
                            {{ trans('index.contact_us') }}
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('where-to-buy') }}">
                            {{ trans('index.where_to_buy') }}
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('faq') }}">
                            {{ trans('index.faq') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer-item">
                <h5>{{ trans('index.product') }}</h5>
                <ul class="footer-menu">
                    @foreach ($pets as $pet)
                        <li>
                            <a draggable="false" href="{{ route('pet.view', ['slug' => $pet->slug]) }}">
                                {{ $pet->translate_name }}
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <a draggable="false" href="{{ route('product.index') }}">
                            {{ trans('index.treatment') }}
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('product.index') }}">
                            {{ trans('index.accessories') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer-item">
                <div class="footer-location-detail">
                    <iframe src="{{ env('CONTACT_GOOGLE_MAPS_IFRAME') }}" width="282" height="202"
                        class="rounded-[10px] max-lg:w-full" frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                    </iframe>

                    <div>
                        <h5>{{ trans('index.location') }} {{ trans('index.google_maps') }}</h5>
                        <a draggable="false" href="{{ route('index') }}">
                            <img draggable="false" src="{{ asset('images/logo.png') }}" class="w-56 mt-4"
                                alt="{{ trans('index.logo') }} - {{ env('APP_TITLE') }}">
                        </a>

                        <ul class="footer-company-detail">
                            <li>
                                <p>
                                    {!! env('CONTACT_ADDRESS') !!}
                                </p>
                            </li>
                            <li>
                                <x-components::link.phone :value="env('CONTACT_PHONE')" />
                            </li>
                            <li>
                                <x-components::link.email :value="env('CONTACT_EMAIL')" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
