@section('title', trans('index.product'))
@section('icon', 'fas fa-box')

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

    <section id="productsList">
        <div class="container mt-10">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <button type="button" class="btn-filter-product" onclick="toggleModal()">
                        <div class="flex items-center gap-3">
                            <i class="material-icons rounded-icon text-2xl">tune</i>
                            <p>{{ trans('index.filters') }}</p>
                        </div>
                    </button>

                    <div class="filter-tag">
                        <div class="flex items-center gap-3">
                            <p>Super Premium</p>
                            <button type="button">
                                <i class="material-icons rounded-icon">close</i>
                            </button>
                        </div>
                    </div>
                    <div class="filter-tag">
                        <div class="flex items-center gap-3">
                            <p>Holistic</p>
                            <button type="button">
                                <i class="material-icons rounded-icon">close</i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <p class="text-primaryGray text-sm font-poppins-r">
                        {{ trans('index.showing') }}
                        {{ 1 + ($page * $products->count()) - $products->count() }} &ndash; {{ $page * $products->count() }}
                        {{ trans('index.from') }}
                        {{ $products->total() }}
                        {{ trans('index.product') }}
                    </p>
                </div>
            </div>

            <div class="mt-10">
                <div class="relative flex gap-6">

                    @livewire('product.product-sidebar')

                    <div class="w-full lg:w-3/4">
                        <div class="gridview-product mb-10">
                            @foreach ($products as $product)
                                <div class="gridview-product-item">
                                    <a draggable="false" href="{{ route('product.view', ['slug' => $product->slug]) }}">
                                        <img draggable="false" src="{{ $product->assetImage() }}"
                                            alt="{{ $product->altImage() }}" />
                                    </a>
                                    <div class="text-center">
                                        <a draggable="false"
                                            href="{{ route('product.view', ['slug' => $product->slug]) }}">
                                            {{ $product->translate_name }}
                                        </a>
                                        <p>{{ trans('index.available') }} {{ $product->size }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{ $products->links() }}
                    </div>
                </div>
            </div>

            <div class="block lg:hidden mt-10">
                <div class="text-right">
                    <p class="text-primaryGray text-sm font-poppins-r">
                        {{ trans('index.show') }} 1 &ndash; {{ $products->count() }} {{ trans('index.from') }}
                        {{ $products->count() }} {{ trans('index.product') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
