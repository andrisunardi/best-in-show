@section('title', $promotion->translate_name)
@section('icon', 'fas fa-eye')

<main>
    <section id="promotionBreadCrumb">
        <div class="container">
            <div class="breadcrumb">
                <ol>
                    <li>
                        <a draggable="false" href="{{ route('index') }}">{{ trans('index.home') }}</a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('promotion.index') }}">{{ trans('index.promotion') }}</a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <span class="current">@yield('title')</span>
                    </li>
                </ol>
            </div>
            <div class="my-6">
                <hr class="border-t-2 border-primaryGray" />
            </div>
        </div>
    </section>

    <section id="promotionDetail">
        <div class="container mt-6">
            <div class="promotion-detail">
                <div class="promo-cover">
                    <img draggable="false" src="{{ $promotion->assetImage() }}"
                        alt="{{ $promotion->translate_name }}" />
                </div>

                <div class="promo-description">
                    <p class="promo-date mb-3">{{ $promotion->date->isoFormat('LL') }}</p>
                    <h1 class="promo-title">{{ $promotion->translate_name }}</h1>

                    <div class="my-6">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <p class="promo-caption">
                        {!! $promotion->translate_description !!}
                    </p>

                    <div class="my-6">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    {{-- <div class="promo-inclusions">
                        <p class="inclusion">&ndash; Dapatkan Promo untuk pembelian Maxi Cat Sand minimal 50 pcs :</p>
                        <button type="button" class="btn-inclusion">
                            <div class="flex items-center gap-2">
                                <i>redeem</i>
                                <p class="font-poppins-r">Diskon Reguler 20% + Cash Diskon 10%</p>
                            </div>
                        </button>
                    </div>

                    <div class="promo-inclusions">
                        <p class="inclusion">&ndash; Dapatkan Promo untuk pembelian Maxi Cat Sand minimal 50 pcs :</p>
                        <button type="button" class="btn-inclusion">
                            <div class="flex items-center gap-2">
                                <i>redeem</i>
                                <p class="font-poppins-r">Diskon Reguler 20% + Cash Diskon 10%</p>
                            </div>
                        </button>
                    </div>

                    <div class="my-6">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <p class="text-primaryRed text-sm font-poppins-r">* Periode promo hanya sampai 28 Desember 2023</p> --}}
                </div>
            </div>
        </div>
    </section>

    <section id="otherPromotions">
        <div class="container mt-10">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ App::isLocale('en') ? 'Other Promotions' : 'Promosi Lainnya' }}
                </h2>
            </div>
            <div class="mt-6">
                <div class="gridview-promotion">
                    @foreach ($relatedPromotions as $relatedPromotion)
                        <div class="gridview-promotion-item">
                            <a draggable="false"
                                href="{{ route('promotion.view', ['slug' => $relatedPromotion->slug]) }}">
                                <img draggable="false" src="{{ $relatedPromotion->assetImage() }}"
                                    alt="{{ $relatedPromotion->translate_name }}" />
                            </a>
                            <div class="mt-3">
                                <p class="promo-date">{{ $relatedPromotion->date->isoFormat('LL') }}</p>
                                <p class="promo-title">
                                    <a draggable="false"
                                        href="{{ route('promotion.view', ['slug' => $relatedPromotion->slug]) }}">
                                        {{ $relatedPromotion->translate_name }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
