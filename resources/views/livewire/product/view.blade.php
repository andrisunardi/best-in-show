@section('title', $product->translate_name)
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
                        <a href="#">Anjing</a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('product.index') }}">{{ trans('index.product') }}</a>
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

    <section id="productDetail">
        <div class="container mt-6">
            <div class="product-detail">
                <div class="product-cover">
                    <img draggable="false" src="{{ $product->assetImage() }}" alt="{{ $product->altImage() }}" />
                </div>

                <div class="product-description">
                    <p class="product-category">
                        ({{ $product->category->translate_name }} - {{ $product->type->translate_name }})
                    </p>
                    <h1 class="product-title">
                        {{ $product->translate_name }}
                    </h1>

                    <div class="my-6">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <p class="product-caption">
                        {!! $product->translate_description !!}
                    </p>

                    <div class="my-6">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <div class="product-variant">
                        <h4>Variant</h4>
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-6">
                            <a href="#" class="btn-product-variant active">
                                Puppy &ndash; Lamb &amp; Rice
                            </a>
                            <a href="#" class="btn-product-variant">
                                Adult &ndash; Lamb &amp; Rice
                            </a>
                            <a href="#" class="btn-product-variant">
                                Adult &ndash; Beef
                            </a>
                        </div>
                    </div>

                    <div class="product-variant">
                        <h4>Ukuran</h4>
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-6">
                            <a href="#" class="btn-product-variant active">
                                18 Kg
                            </a>
                            <a href="#" class="btn-product-variant">
                                1.6 Kg
                            </a>
                            <a href="#" class="btn-product-variant">
                                100 Gr
                            </a>
                        </div>
                    </div>

                    <div class="my-6">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <p class="text-primaryBlack text-xl font-poppins-m">Belanja di:</p>
                    <div class="mt-2 grid grid-cols-2 gap-3 lg:gap-6">
                        @if ($product->blibli)
                            <a draggable="false" href="{{ $product->blibli }}" class="btn-product-market"
                                target="_blank">
                                <img src="{{ asset('assets/images/logo/blibli-logo.webp') }}" alt="Blibli">
                            </a>
                        @endif

                        @if ($product->lazada)
                            <a draggable="false" href="{{ $product->lazada }}" class="btn-product-market"
                                target="_blank">
                                <img src="{{ asset('assets/images/logo/lazada-logo.webp') }}" alt="Lazada">
                            </a>
                        @endif

                        @if ($product->shopee)
                            <a draggable="false" href="{{ $product->shopee }}" class="btn-product-market"
                                target="_blank">
                                <img src="{{ asset('assets/images/logo/shopee-logo.webp') }}" alt="Shopee">
                            </a>
                        @endif

                        @if ($product->tokopedia)
                            <a draggable="false" href="{{ $product->tokopedia }}" class="btn-product-market"
                                target="_blank">
                                <img src="{{ asset('assets/images/logo/tokopedia-logo.webp') }}" alt="Tokopedia">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-10">
        <hr class="border-t border-[#BDBDBD]" />
    </div>

    <section id="otherProducts">
        <div class="container">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ trans('index.other_products') }}
                </h2>
            </div>
            <div class="mt-6">
                <div class="gridview-product-detail">
                    <div class="gridview-product-detail-item">
                        <img src="{{ $product->assetImage() }}" alt="Good Dog Puppy Lamb & Rice" />
                        <div class="mt-2 text-center">
                            <a href="#">Good Dog Puppy Lamb & Rice</a>
                            <p>Available 18Kg</p>
                        </div>
                    </div>
                    <div class="gridview-product-detail-item">
                        <img src="{{ $product->assetImage() }}" alt="Good Dog Puppy Lamb & Rice" />
                        <div class="mt-2 text-center">
                            <a href="#">Good Dog Puppy Lamb & Rice</a>
                            <p>Available 18Kg</p>
                        </div>
                    </div>
                    <div class="gridview-product-detail-item">
                        <img src="{{ $product->assetImage() }}" alt="Good Dog Puppy Lamb & Rice" />
                        <div class="mt-2 text-center">
                            <a href="#">Good Dog Puppy Lamb & Rice</a>
                            <p>Available 18Kg</p>
                        </div>
                    </div>
                    <div class="gridview-product-detail-item">
                        <img src="{{ $product->assetImage() }}" alt="Good Dog Puppy Lamb & Rice" />
                        <div class="mt-2 text-center">
                            <a href="#">Good Dog Puppy Lamb & Rice</a>
                            <p>Available 18Kg</p>
                        </div>
                    </div>
                    <div class="gridview-product-detail-item">
                        <img src="{{ $product->assetImage() }}" alt="Good Dog Puppy Lamb & Rice" />
                        <div class="mt-2 text-center">
                            <a href="#">Good Dog Puppy Lamb & Rice</a>
                            <p>Available 18Kg</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
