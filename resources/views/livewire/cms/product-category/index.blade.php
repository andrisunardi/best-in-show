@section('title', trans('index.product_category'))
@section('icon', 'fas fa-tag')

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
                    <x-components::search.select :key="'product_type_id'" :title="trans('validation.attributes.product_type_id')" :icon="'fas fa-tags'"
                        :datas="$productTypes" />
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
                @can('Product Category Add')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.add :href="route('cms.product-category.add')" />
                    </div>
                @endcan

                @can('Product Category Trash')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.trash :href="route('cms.product-category.trash')" />
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
                            <th width="1%">{{ trans('index.product_type') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.name_idn') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('index.product') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productCategories as $productCategory)
                            <tr wire:key="{{ $productCategory->id }}">
                                <td class="text-center">
                                    {{ ($productCategories->currentPage() - 1) * $productCategories->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.product-category.view', [
                                        'productCategory' => $productCategory->id,
                                    ])" :text="$productCategory->id" />
                                </td>
                                <td>
                                    @if ($productCategory->checkImage())
                                        <x-components::image :src="$productCategory->assetImage()" :alt="$productCategory->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($productCategory->pet)
                                        <x-components::link :href="route('cms.pet.view', [
                                            'pet' => $productCategory->pet->id,
                                        ])" :text="$productCategory->pet->translate_name" />

                                        <x-components::link.external-link :href="route('pet.view', [
                                            'slug' => $productCategory->pet->slug,
                                        ])" />
                                    @endif
                                </td>
                                <td>
                                    @if ($productCategory->productType)
                                        <x-components::link :href="route('cms.product-type.view', [
                                            'productType' => $productCategory->productType->id,
                                        ])" :text="$productCategory->productType->translate_name" />

                                        @if ($productCategory->productType->pet)
                                            <a draggable="false" target="_blank"
                                                href="{{ route('pet.view', ['slug' => $productCategory->productType->pet->slug]) . '?product_types[0]=' . $productCategory->productType->id }}">
                                                <span class="fas fa-external-link"></span>
                                            </a>
                                        @endif
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $productCategory->name }}

                                    @if ($productCategory->pet)
                                        <a draggable="false" target="_blank"
                                            href="{{ route('pet.view', ['slug' => $productCategory->pet->slug]) . '?product_categories[0]=' . $productCategory->id }}">
                                            <span class="fas fa-external-link"></span>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $productCategory->name_idn }}

                                    @if ($productCategory->pet)
                                        <a draggable="false" target="_blank"
                                            href="{{ route('pet.view', ['slug' => $productCategory->pet->slug]) . '?product_categories[0]=' . $productCategory->id }}">
                                            <span class="fas fa-external-link"></span>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{-- <x-components::link :href="route('cms.product.index', [
                                        'product_category_id' => $productCategory->id,
                                    ])" :text="$productCategory->products->count()" /> --}}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($productCategory->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($productCategory->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Product Category View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.product-category.view', [
                                                    'productCategory' => $productCategory->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Category Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.product-category.clone', [
                                                    'productCategory' => $productCategory->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Category Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.product-category.edit', [
                                                    'productCategory' => $productCategory->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Category Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.product-category.active', [
                                                    'productCategory' => $productCategory->id,
                                                ])"
                                                    :value="$productCategory->is_active" />
                                            </li>
                                        @endcan
                                        @can('Product Category Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.product-category.delete', [
                                                    'productCategory' => $productCategory->id,
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

            {{ $productCategories->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
