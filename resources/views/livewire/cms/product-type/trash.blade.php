@section('title', trans('index.trash') . ' - ' . trans('index.product_type'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.product_type') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.select :key="'pet_id'" :title="trans('validation.attributes.pet_id')" :icon="'fas fa-dog'"
                        :datas="$pets" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name_idn'" :title="trans('validation.attributes.name_idn')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.is-active />
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <x-components::form.reset :text="trans('index.reset_filter')" />
                </div>
            </div>
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.product_type') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.product-type.index')" />
                </div>

                @can('Product Type Restore')
                    @if ($productTypes->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.restore-all :href="route('cms.product-type.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Product Type Delete Permanent')
                    @if ($productTypes->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.delete-permanent-all :href="route('cms.product-type.delete-permanent-all')" />
                        </div>
                    @endif
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th width="1%">{{ trans('index.image') }}</th>
                            <th width="1%">{{ trans('index.pet') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.name_idn') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('index.product_category') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('index.product') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productTypes as $productType)
                            <tr wire:key="{{ $productType->id }}">
                                <td class="text-center">
                                    {{ ($productTypes->currentPage() - 1) * $productTypes->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.product-type.view', [
                                        'productType' => $productType->id,
                                    ])" :text="$productType->id" />
                                </td>
                                <td>
                                    @if ($productType->checkImage())
                                        <x-components::image :src="$productType->assetImage()" :alt="$productType->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($productType->pet)
                                        <x-components::link :href="route('cms.pet.view', [
                                            'pet' => $productType->pet->id,
                                        ])" :text="$productType->pet->name" />

                                        <x-components::link.external-link :href="route('pet.view', [
                                            'slug' => $productType->pet->slug,
                                        ])" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $productType->name }}

                                    @if ($productType->pet)
                                        <a draggable="false" target="_blank"
                                            href="{{ route('pet.view', ['slug' => $productType->pet->slug]) . '?product_types[0]=' . $productType->id }}">
                                            <span class="fas fa-external-link"></span>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $productType->name_idn }}

                                    @if ($productType->pet)
                                        <a draggable="false" target="_blank"
                                            href="{{ route('pet.view', ['slug' => $productType->pet->slug]) . '?product_types[0]=' . $productType->id }}">
                                            <span class="fas fa-external-link"></span>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.product-category.index', [
                                        'product_type_id' => $productType->id,
                                    ])" :text="$productType->productCategories->count()" />
                                </td>
                                <td class="text-center">
                                    {{-- <x-components::link :href="route('cms.product.index', [
                                        'product_type_id' => $productType->id,
                                    ])" :text="$productType->products->count()" /> --}}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($productType->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($productType->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Product Type Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.product-type.restore', [
                                                    'productType' => $productType->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Type Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.product-type.delete-permanent', [
                                                        'productType' => $productType->id,
                                                    ])" />
                                            </li>
                                        @endcan
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">
                                    {{ trans('index.no_data_available') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $productTypes->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
