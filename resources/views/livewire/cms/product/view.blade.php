@section('title', trans('index.view') . ' - ' . trans('index.product'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $product->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.product') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.product.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($product->checkImage())
                        <x-components::image :src="$product->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$product->assetImage()" />
                            </div>
                            @can('Product Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.product.delete-image', [
                                        'product' => $product->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.pet') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->pet)
                        <x-components::link :href="route('cms.pet.view', [
                            'pet' => $product->pet->id,
                        ])" :text="$product->pet->translate_name" />

                        <x-components::link.external-link :href="route('pet.view', [
                            'slug' => $product->pet->slug,
                        ])" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.product_type') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->type)
                        <x-components::link :href="route('cms.product-type.view', [
                            'productType' => $product->type->id,
                        ])" :text="$product->type->translate_name" />

                        @if ($product->type->pet)
                            <a draggable="false" target="_blank"
                                href="{{ route('pet.view', ['slug' => $product->type->pet->slug]) . '?product_types[0]=' . $product->type->id }}">
                                <span class="fas fa-external-link"></span>
                            </a>
                        @endif
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.product_category') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->category)
                        <x-components::link :href="route('cms.product-category.view', [
                            'productCategory' => $product->category->id,
                        ])" :text="$product->category->translate_name" />

                        @if ($product->category->pet)
                            <a draggable="false" target="_blank"
                                href="{{ route('pet.view', ['slug' => $product->category->pet->slug]) . '?product_categories[0]=' . $product->category->id }}">
                                <span class="fas fa-external-link"></span>
                            </a>
                        @endif
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->name }}

                    <x-components::link.external-link :href="route('product.view', [
                        'slug' => $product->slug,
                    ])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->name_idn }}

                    <x-components::link.external-link :href="route('product.view', [
                        'slug' => $product->slug,
                    ])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $product->description !!}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $product->description_idn !!}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.variant') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->variant }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.variant_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->variant_idn }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.size') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->size }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.weight') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->weight }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.color') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->color }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.blibli') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="$product->blibli" :text="$product->blibli" :target="'_blank'" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.lazada') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="$product->lazada" :text="$product->lazada" :target="'_blank'" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.shopee') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="$product->shopee" :text="$product->shopee" :target="'_blank'" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.tokopedia') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="$product->tokopedia" :text="$product->tokopedia" :target="'_blank'" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($product->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($product->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->createdBy)
                        <x-components::link.user :data="$product->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->updatedBy)
                        <x-components::link.user :data="$product->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($product->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($product->deletedBy)
                            <x-components::link.user :data="$product->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->created_at)
                        {{ $product->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $product->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->updated_at)
                        {{ $product->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $product->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($product->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($product->deleted_at)
                            {{ $product->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $product->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row g-3">
                @if ($product->trashed())
                    @can('Product Restore')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore :href="route('cms.product.restore', [
                                'product' => $product->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Delete Permanent')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent :href="route('cms.product.delete-permanent', [
                                'product' => $product->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Product Active')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.active :href="route('cms.product.active', [
                                'product' => $product->id,
                            ])" :value="$product->is_active" />
                        </div>
                    @endcan

                    @can('Product Clone')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.clone :href="route('cms.product.clone', [
                                'product' => $product->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Edit')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.edit :href="route('cms.product.edit', [
                                'product' => $product->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Delete')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.delete :href="route('cms.product.delete', [
                                'product' => $product->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $product->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
