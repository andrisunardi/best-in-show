@section('title', trans('index.pet'))
@section('icon', 'fas fa-dog')

<main>
    <section id="productsBreadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <ol>
                    <li>
                        <a draggable="false" href="{{ route('index') }}">{{ trans('index.home') }}</a>
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
                                <a draggable="false" href="{{ route('product.index') }}" class="category-link">
                                    {{ trans('index.explore') }} {{ trans('index.products') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
