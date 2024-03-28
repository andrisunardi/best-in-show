@section('title', trans('index.view') . ' - ' . trans('index.product_category'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $productCategory->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.product_category') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.product-category.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $productCategory->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($productCategory->checkImage())
                        <x-components::image :src="$productCategory->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$productCategory->assetImage()" />
                            </div>
                            @can('Product Category Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.product-category.delete-image', [
                                        'productCategory' => $productCategory->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $productCategory->name }}
                    {{-- <x-components::link.external-link :href="route('productCategory.view', ['slug' => $productCategory->slug])" /> --}}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $productCategory->name_idn }}
                    {{-- <x-components::link.external-link :href="route('productCategory.view', ['slug' => $productCategory->slug])" /> --}}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.total') }} {{ trans('index.product_category') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $productCategory->productCategories->count() }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.total') }} {{ trans('index.product') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $productCategory->products->count() }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($productCategory->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($productCategory->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productCategory->createdBy)
                        <x-components::link.user :data="$productCategory->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productCategory->updatedBy)
                        <x-components::link.user :data="$productCategory->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($productCategory->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($productCategory->deletedBy)
                            <x-components::link.user :data="$productCategory->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productCategory->created_at)
                        {{ $productCategory->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $productCategory->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productCategory->updated_at)
                        {{ $productCategory->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $productCategory->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($productCategory->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($productCategory->deleted_at)
                            {{ $productCategory->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $productCategory->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($productCategory->trashed())
                    @can('Product Category Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.product-category.restore', [
                                'productCategory' => $productCategory->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Category Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.product-category.delete-permanent', [
                                'productCategory' => $productCategory->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Product Category Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.product-category.active', [
                                'productCategory' => $productCategory->id,
                            ])" :value="$productCategory->is_active" />
                        </div>
                    @endcan

                    @can('Product Category Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.product-category.clone', [
                                'productCategory' => $productCategory->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Category Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.product-category.edit', [
                                'productCategory' => $productCategory->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Category Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.product-category.delete', [
                                'productCategory' => $productCategory->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $productCategory->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
