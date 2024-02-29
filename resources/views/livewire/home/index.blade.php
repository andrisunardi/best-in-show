@section('title', trans('index.home'))
@section('icon', 'fas fa-home')

<main>
    <section id="homeIntro">
        <div class="container">
            <div class="text-center">
                <h1 class="page-heading-1 text-secondaryRed">
                    @if (App::isLocale('en'))
                        Trust Your Animal's Life To
                    @else
                        Percayakan Kehidupan Hewan Anda Pada
                    @endif
                    <br />
                    {{ trans('index.product') }} {{ env('APP_NAME') }}
                </h1>
            </div>
            <div class="mt-4 text-center">
                <h4 class="text-primaryBlack font-poppins-r">
                    @if (App::isLocale('en'))
                        Discover the Differences You Can See and Feel in Your Favorite Animal
                    @else
                        Temukan Perbedaan yang Dapat Dilihat dan Dirasakan pada Hewan Kesayangan Anda
                    @endif
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
                <img draggable="false" src="{{ asset('assets/images/banner/pet-categories.webp') }}" class="w-full" />
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
                        <p class="item-title">SUPER PREMIUM</p>
                        <div class="mt-4">
                            <p class="item-caption">
                                Lorem ipsum dolor sit amet consectetur. Sit in feugiat tempus sit rhoncus orci aliquam.
                                Fringilla neque fringilla suspendisse velit sed volutpat. Sit nisi integer rhoncus quis
                                dolor phasellus varius semper consequat. Tincidunt
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="#" class="item-link">Check Our Blog</a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <p class="item-title">SUPER PREMIUM</p>
                        <div class="mt-4">
                            <p class="item-caption">
                                Lorem ipsum dolor sit amet consectetur. Sit in feugiat tempus sit rhoncus orci aliquam.
                                Fringilla neque fringilla suspendisse velit sed volutpat. Sit nisi integer rhoncus quis
                                dolor phasellus varius semper consequat. Tincidunt
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="#" class="item-link">Check Our Blog</a>
                        </div>
                    </div>

                    <div class="grid-item">
                        <img draggable="false" src="{{ asset('assets/images/thumbnail/sample-brand-info.png') }}"
                            class="w-52 mx-auto" alt="Info Kami">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="homeContact">
        <div class="container mt-20">
            <div class="text-center">
                <h2 class="page-heading-2 text-secondaryRed">
                    Temukan Produk BEST IN SHOW di Online Store <br />
                    atau Toko-Toko Terdekat
                </h2>
            </div>

            <div class="mt-10">
                <div class="text-center">
                    <p class="text-primaryGray text-sm lg:text-base font-poppins-sb">
                        DAPATKAN DISKON DAN PROMO TERBAIK
                    </p>
                </div>

                <div class="gridview-store">
                    <a href="https://www.tokopedia.com/" class="store">
                        <img src="{{ asset('assets/images/logo/blibli-logo.webp') }}" alt="Blibli">
                    </a>
                    <a href="https://www.tokopedia.com/" class="store">
                        <img src="{{ asset('assets/images/logo/lazada-logo.webp') }}" alt="Blibli">
                    </a>
                    <a href="https://www.tokopedia.com/" class="store">
                        <img src="{{ asset('assets/images/logo/shopee-logo.webp') }}" alt="Blibli">
                    </a>
                    <a href="https://www.tokopedia.com/" class="store">
                        <img src="{{ asset('assets/images/logo/tokopedia-logo.webp') }}" alt="Blibli">
                    </a>
                </div>

                <div class="my-10">
                    <hr class="border-t-4 border-[#BDBDBD]" />
                </div>

                <div class="text-center">
                    <h3 class="page-heading-2 text-primaryBlack">Sosial Media</h3>
                </div>

                <div class="mt-10">
                    <div class="sosmed-flex">
                        <a href="https://www.instagram.com/">
                            <img src="assets/images/logo/instagram-logo.webp" alt="Instagram">
                            <p>Bestinshow.id</p>
                        </a>
                        <a href="https://www.instagram.com/">
                            <img src="assets/images/logo/facebook-logo.webp" alt="Facebook">
                            <p>Best In Show Indonesia</p>
                        </a>
                        <a href="https://www.instagram.com/">
                            <img src="assets/images/logo/youtube-logo.webp" alt="YouTube">
                            <p>Best In Show</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
