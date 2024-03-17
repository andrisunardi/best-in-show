<div class="hidden lg:block w-1/4">
    <div class="filter-card">
        <form action="" class="product-form">
            <h2>{{ trans('index.search') }} {{ trans('index.product') }}</h2>

            <div class="relative mt-4">
                <div class="absolute top-1/2 left-3 -translate-y-1/2">
                    <i class="material-icons rounded-icon">search</i>
                </div>
                <input type="text" placeholder="{{ trans('index.search') }} {{ trans('index.product') }}" />
            </div>

            <div class="relative mt-6">
                <h2>{{ trans('index.category') }}</h2>

                <div class="mt-3">
                    <button type="button" class="accordion">
                        <div class="flex justify-between items-center">
                            <p>{{ $pet->translate_name }}</p>
                            <i class="arrow">arrow_drop_down</i>
                        </div>
                    </button>
                    <div class="panel" style="display: none; overflow: hidden;">
                        @foreach ($pet->productTypes as $productType)
                            <div class="form-group">
                                <label for="">{{ $productType->translate_name }}</label>
                                <input id="" type="checkbox" />
                            </div>
                        @endforeach

                        @foreach ($pet->productCategories as $productCategory)
                            <div class="form-group">
                                <label for="">{{ $productCategory->translate_name }}</label>
                                <input id="" type="checkbox" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
