<footer class="pb-20">
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
                        <a draggable="false" href="{{ route('contact-us') }}" wire:navigate>
                            {{ trans('index.contact_us') }}
                        </a>
                    </li>
                    {{-- <li>
                        <a draggable="false" href="{{ route('where-to-buy') }}">
                            {{ trans('index.where_to_buy') }}
                        </a>
                    </li> --}}
                    <li>
                        <a draggable="false" href="{{ route('faq') }}" wire:navigate>
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
                        <a draggable="false" href="{{ route('product.index', ['search' => 'treatment']) }}" wire:navigate>
                            {{ trans('index.treatment') }}
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('product.index', ['search' => 'accessories']) }}" wire:navigate>
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
                                    <a draggable="false" href="{{ env('CONTACT_GOOGLE_MAPS') }}" target="_blank">
                                        {!! env('CONTACT_ADDRESS') !!}
                                    </a>
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

        <div class="mt-20 text-center">
            <p class="text-primaryWhite text-sm font-poppins-r">
                &copy; {{ trans('index.copyright') }}
                {{ env('APP_YEAR') && env('APP_YEAR') != now()->year ? env('APP_YEAR') . ' - ' : null }}
                {{ now()->year }} &reg;
                <a draggable="false" href="{{ route('index') }}" target="_blank">
                    <strong><span class="font-poppins-sb">{{ env('APP_NAME') }}</span></strong>&trade;
                </a>
                {{ trans('index.all_rights_reserved') }}.
            </p>
            <p class="mt-2 text-primaryWhite text-sm font-poppins-r">
                {{ trans('index.created_and_designed_by') }}
                <a draggable="false" href="https://www.diw.co.id" target="_blank">
                    <img draggable="false" src="{{ asset('images/icon-diw.co.id.png') }}" class="inline-block w-20"
                        alt="Icon DIW.co.id" title="{{ trans('index.created_and_designed_by') }} DIW.co.id">
                </a>
            </p>
        </div>
    </div>
</footer>
