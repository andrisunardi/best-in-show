@section('title', trans('index.product_type'))
@section('icon', 'fas fa-tags')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
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

        <div class="card-footer bg-primary-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                @can('Product Type Add')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.add :href="route('cms.product-type.add')" />
                    </div>
                @endcan

                @can('Product Type Trash')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.trash :href="route('cms.product-type.trash')" />
                    </div>
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
                                        ])" :text="$productType->pet->translate_name" />

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
                                        @can('Product Type View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.product-type.view', [
                                                    'productType' => $productType->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Type Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.product-type.clone', [
                                                    'productType' => $productType->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Type Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.product-type.edit', [
                                                    'productType' => $productType->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Type Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.product-type.active', [
                                                    'productType' => $productType->id,
                                                ])"
                                                    :value="$productType->is_active" />
                                            </li>
                                        @endcan
                                        @can('Product Type Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.product-type.delete', [
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

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
