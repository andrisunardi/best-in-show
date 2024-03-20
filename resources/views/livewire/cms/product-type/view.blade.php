@section('title', trans('index.view') . ' - ' . trans('index.product_type'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $productType->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.product_type') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.product-type.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $productType->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($productType->checkImage())
                        <x-components::image :src="$productType->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$productType->assetImage()" />
                            </div>
                            @can('Product Type Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.product-type.delete-image', [
                                        'productType' => $productType->id,
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
                    {{ $productType->name }}
                    <x-components::link.external-link :href="route('productType.view', ['slug' => $productType->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $productType->name_idn }}
                    <x-components::link.external-link :href="route('productType.view', ['slug' => $productType->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $productType->description !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $productType->description_idn !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.date') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productType->date)
                        {{ $productType->date->isoFormat('LL') }}
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($productType->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($productType->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productType->createdBy)
                        <x-components::link.user :data="$productType->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productType->updatedBy)
                        <x-components::link.user :data="$productType->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($productType->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($productType->deletedBy)
                            <x-components::link.user :data="$productType->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productType->created_at)
                        {{ $productType->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $productType->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($productType->updated_at)
                        {{ $productType->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $productType->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($productType->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($productType->deleted_at)
                            {{ $productType->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $productType->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($productType->trashed())
                    @can('Product Type Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.product-type.restore', [
                                'productType' => $productType->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Type Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.product-type.delete-permanent', [
                                'productType' => $productType->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Product Type Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.product-type.active', [
                                'productType' => $productType->id,
                            ])" :value="$productType->is_active" />
                        </div>
                    @endcan

                    @can('Product Type Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.product-type.clone', [
                                'productType' => $productType->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Type Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.product-type.edit', [
                                'productType' => $productType->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Product Type Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.product-type.delete', [
                                'productType' => $productType->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $productType->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
