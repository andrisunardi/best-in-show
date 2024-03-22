<div id="filtermodal" class="modal-wrapper" style="display: none;" wire:ignore>
    <div class="modal-card">
        <div class="absolute top-0 right-0">
            <button type="button" class="close-modal" onclick="toggleModal()">
                <i class="material-icons rounded-icon text-xl">close</i>
            </button>
        </div>

        <form wire:submit.prevent role="form" autocomplete="off" class="product-form">
            <h2>{{ trans('index.search') }} {{ trans('index.product') }}</h2>

            <div class="relative mt-4">
                <div class="absolute top-1/2 left-3 -translate-y-1/2">
                    <i class="material-icons rounded-icon">search</i>
                </div>
                <input type="text" wire:model.live="search"
                    placeholder="{{ trans('index.search') }} {{ trans('index.product') }}" required />
            </div>

            <div class="relative mt-6">
                <h2>{{ trans('index.category') }}</h2>

                <div class="mt-3">
                    @foreach ($pets as $pet)
                        <button type="button" class="accordion">
                            <div class="flex justify-between items-center">
                                <p>{{ $pet->translate_name }}</p>
                                <i class="arrow">arrow_drop_down</i>
                            </div>
                        </button>
                        <div class="panel" style="display: none; overflow: hidden;">
                            @foreach ($pet->productTypes as $productType)
                                <div class="form-group">
                                    <label for="product_type_{{ $productType->id }}">
                                        {{ $productType->translate_name }}
                                    </label>
                                    <input id="product_type_{{ $productType->id }}" name="product_types" type="checkbox"
                                        wire:model.live="product_types" value="{{ $productType->id }}" />
                                </div>
                            @endforeach

                            @foreach ($pet->productCategories as $productCategory)
                                <div class="form-group">
                                    <label for="product_category_{{ $productCategory->id }}">
                                        {{ $productCategory->translate_name }}
                                    </label>
                                    <input id="product_category_{{ $productCategory->id }}" name="product_categories"
                                        type="checkbox" wire:model.live="product_categories"
                                        value="{{ $productCategory->id }}" />
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
</div>
