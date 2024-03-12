@section('title', trans('index.home'))
@section('icon', 'fas fa-home')

<main>
    <section id="homeIntro">
        <div class="container">
            <div class="text-center">
                <h1 class="page-heading-1 text-secondaryRed">
                    {{ App::isLocale('en') ? "Trust Your Animal's Life To" : 'Percayakan Kehidupan Hewan Anda Pada' }}
                    <br />
                    {{ trans('index.product') }} {{ env('APP_NAME') }}
                </h1>
            </div>
            <div class="mt-4 text-center">
                <h4 class="text-primaryBlack font-poppins-r">
                    {{ App::isLocale('en') ? 'Discover the Differences You Can See and Feel in Your Favorite Animal' : 'Temukan Perbedaan yang Dapat Dilihat dan Dirasakan pada Hewan Kesayangan Anda' }}
                </h4>
            </div>
            <div class="mt-4">
                <div class="flex flex-col lg:flex-row justify-center items-center gap-6">
                    @foreach ($pets as $pet)
                        <a draggable="false" href="{{ route('pet.view', ['slug' => $pet->slug]) }}"
                            class="btn-intro-category">
                            {{ $pet->translate_name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="mt-8">
                <a draggable="false" href="{{ route('pet.index') }}">
                    <img draggable="false" src="{{ asset('assets/images/banner/pet-categories.webp') }}" class="w-full"
                        alt="Pet Categories - {{ env('APP_TITLE') }}" />
                </a>
            </div>
        </div>
    </section>

    <section id="homeProduct">
        <div class="container">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ trans('index.our_product') }}
                </h2>
            </div>
            <div class="mt-6">
                <div class="gridview-category">
                    @foreach ($pets as $pet)
                        <div class="grid-item">
                            <a href="#" class="category-thumbnail"
                                style="background: linear-gradient(
                        0deg,
                        rgba(29, 29, 29, 0.40) 0%,
                        rgba(29, 29, 29, 0.40) 100%
                      ),
                      url({{ $pet->assetProductImage() }}) center / cover no-repeat,
                      #D9D9D9;">
                                <div class="absolute top-1/2 left-1/2 translate-50">
                                    <p class="text-primaryWhite text-xl font-poppins-m">
                                        {{ $pet->translate_name }}
                                    </p>
                                </div>
                            </a>

                            <div class="mt-4 text-center">
                                <a draggable="false" href="{{ route('pet.view', ['slug' => $pet->slug]) }}"
                                    class="category-link">
                                    {{ trans('index.explore') }} {{ trans('index.products') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="homeInfo">
        <div class="container">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ trans('index.our_information') }}
                </h2>
            </div>
            <div class="mt-6">
                <div class="gridview-brand-info">
                    <div class="grid-item">
                        <p class="item-title">{{ $latestEvent->translate_name }}</p>
                        <div class="mt-4">
                            <p class="item-caption">
                                {!! Str::limit(strip_tags($latestEvent->translate_description), 200) !!}
                            </p>
                        </div>
                        <div class="mt-6">
                            <a draggable="false" href="{{ route('promotion.view', ['slug' => $latestEvent->slug]) }}"
                                class="item-link">
                                {{ App::isLocale('en') ? 'Check Our Latest Event' : 'Lihat Kegiatan Terbaru Kami' }}
                            </a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <p class="item-title">{{ $latestPromotion->translate_name }}</p>
                        <div class="mt-4">
                            <p class="item-caption">
                                {!! Str::limit(strip_tags($latestPromotion->translate_description), 200) !!}
                            </p>
                        </div>
                        <div class="mt-6">
                            <a draggable="false" href="{{ route('promotion.view', ['slug' => $latestEvent->slug]) }}"
                                class="item-link">
                                {{ App::isLocale('en') ? 'Check Our Latest Promotion' : 'Lihat Promosi Terbaru Kami' }}
                            </a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <a draggable="false" href="{{ route('pet.index') }}">
                            <img draggable="false" src="{{ asset('assets/images/thumbnail/sample-brand-info.png') }}"
                                class="w-52 mx-auto" alt="Info Kami">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="homeActivities">
        <div class="relative container mt-20">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ trans('index.our_events') }}
                </h2>
            </div>

            <div class="mt-10 flex justify-between items-center gap-4 lg:gap-6">
                <button type="button" class="articles-arrow articles-arrow-prev">
                    <i class="material-icons rounded-icon">chevron_left</i>
                </button>
                <div class="swiper swiper-articles">
                    <div class="swiper-wrapper">
                        @foreach ($latestEvents as $latestEvent)
                            <div class="swiper-slide article-item">
                                <div class="article-image-thumbnail"
                                    style="background: url({{ $latestEvent->assetImage() }}) center / cover no-repeat;">
                                </div>

                                <div class="mt-3">
                                    <p class="article-latest-date">{{ $latestEvent->date->isoFormat('LL') }}</p>
                                    <h2 class="article-latest-title">{{ $latestEvent->translate_name }}</h2>
                                    <p class="article-latest-preview">
                                        {{ Str::limit(strip_tags($latestEvent->translate_description), 100) }}</li>
                                        <a draggable="false"
                                            href="{{ route('event.view', ['slug' => $latestEvent->slug]) }}"
                                            class="article-readmore">
                                            {{ trans('index.read_more') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="articles-arrow articles-arrow-next">
                    <i class="material-icons rounded-icon">chevron_right</i>
                </button>
            </div>
        </div>
    </section>

    <section id="homeContact">
        <div class="container mt-20">
            <div class="text-center">
                <h2 class="page-heading-2 text-secondaryRed">
                    {{ App::isLocale('en') ? 'Find the BEST IN SHOW Products in the Online Store' : 'Temukan Produk BEST IN SHOW di Online Store' }}
                    <br />
                    {{ App::isLocale('en') ? 'or Nearest Shops' : 'atau Toko-Toko Terdekat' }}
                </h2>
            </div>

            <div class="mt-10">
                <div class="text-center">
                    <p class="text-primaryGray text-sm lg:text-base font-poppins-sb">
                        {{ App::isLocale('en') ? 'GET THE BEST DISCOUNTS AND PROMOS' : 'DAPATKAN DISKON DAN PROMO TERBAIK' }}
                    </p>
                </div>

                <div class="gridview-store">
                    <a draggable="false" href="{{ env('LINK_SHOP_BLIBLI') }}" class="store" target="_blank">
                        <img draggable="false" src="{{ asset('assets/images/logo/blibli-logo.webp') }}"
                            alt="Blibli - {{ env('APP_TITLE') }}">
                    </a>
                    <a draggable="false" href="{{ env('LINK_SHOP_LAZADA') }}" class="store" target="_blank">
                        <img draggable="false" src="{{ asset('assets/images/logo/lazada-logo.webp') }}"
                            alt="Lazada - {{ env('APP_TITLE') }}">
                    </a>
                    <a draggable="false" href="{{ env('LINK_SHOP_SHOPEE') }}" class="store" target="_blank">
                        <img draggable="false" src="{{ asset('assets/images/logo/shopee-logo.webp') }}"
                            alt="Shopee - {{ env('APP_TITLE') }}">
                    </a>
                    <a draggable="false" href="{{ env('LINK_SHOP_TOKOPEDIA') }}" class="store" target="_blank">
                        <img draggable="false" src="{{ asset('assets/images/logo/tokopedia-logo.webp') }}"
                            alt="Tokopedia - {{ env('APP_TITLE') }}">
                    </a>
                </div>

                <div class="my-10">
                    <hr class="border-t-4 border-[#BDBDBD]" />
                </div>

                <div class="text-center">
                    <h3 class="page-heading-2 text-primaryBlack">
                        {{ trans('index.social_media') }}
                    </h3>
                </div>

                <div class="mt-10">
                    <div class="sosmed-flex">
                        <a draggable="false" href="{{ env('LINK_SOCIAL_MEDIA_INSTAGRAM') }}" target="_blank">
                            <img draggable="false" src="{{ asset('assets/images/logo/instagram-logo.webp') }}"
                                alt="Instagram - {{ env('APP_TITLE') }}">
                            <p>Bestinshow.id</p>
                        </a>
                        <a draggable="false" href="{{ env('LINK_SOCIAL_MEDIA_FACEBOOK') }}" target="_blank">
                            <img draggable="false" src="{{ asset('assets/images/logo/facebook-logo.webp') }}"
                                alt="Facebook - {{ env('APP_TITLE') }}">
                            <p>Best In Show Indonesia</p>
                        </a>
                        <a draggable="false" href="{{ env('LINK_SOCIAL_MEDIA_YOUTUBE') }}" target="_blank">
                            <img draggable="false" src="{{ asset('assets/images/logo/youtube-logo.webp') }}"
                                alt="YouTube - {{ env('APP_TITLE') }}">
                            <p>Best In Show</p>
                        </a>
                        <a draggable="false" href="{{ env('LINK_SOCIAL_MEDIA_TIKTOK') }}" target="_blank">
                            <img draggable="false" src="{{ asset('assets/images/logo/tiktok-logo.png') }}"
                                alt="Tiktok - {{ env('APP_TITLE') }}">
                            <p>bestinshow_id</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
