@section('title', trans('index.trash') . ' - ' . trans('index.product'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.product') }}
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
                    <x-components::search.select :key="'product_category_id'" :title="trans('validation.attributes.product_category_id')" :icon="'fas fa-tag'"
                        :datas="$productCategories" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name_idn'" :title="trans('validation.attributes.name_idn')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'description'" :title="trans('validation.attributes.description')" :icon="'fas fa-file-text'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'description_idn'" :title="trans('validation.attributes.description_idn')" :icon="'fas fa-file-text'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'variant'" :title="trans('validation.attributes.variant')" :icon="'fas fa-boxes'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'variant_idn'" :title="trans('validation.attributes.variant_idn')" :icon="'fas fa-boxes'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'size'" :title="trans('validation.attributes.size')" :icon="'fas fa-balance-scale'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'weight'" :title="trans('validation.attributes.weight')" :icon="'fas fa-weight'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'color'" :title="trans('validation.attributes.color')" :icon="'fas fa-palette'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'blibli'" :title="trans('validation.attributes.blibli')" :icon="'fas fa-link'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'lazada'" :title="trans('validation.attributes.lazada')" :icon="'fas fa-link'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'shopee'" :title="trans('validation.attributes.shopee')" :icon="'fas fa-link'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'tokopedia'" :title="trans('validation.attributes.tokopedia')" :icon="'fas fa-link'" />
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
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.product') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-12 col-sm-auto">
                    <x-components::link.back :href="route('cms.product.index')" />
                </div>

                @can('Product Restore')
                    @if ($products->count())
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore-all :href="route('cms.product.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Product Delete Permanent')
                    @if ($products->count())
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent-all :href="route('cms.product.delete-permanent-all')" />
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
                            <th width="1%">{{ trans('index.product_type') }}</th>
                            <th width="1%">{{ trans('index.product_category') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.name_idn') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr wire:key="{{ $product->id }}">
                                <td class="text-center">
                                    {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.product.view', [
                                        'product' => $product->id,
                                    ])" :text="$product->id" />
                                </td>
                                <td>
                                    @if ($product->checkImage())
                                        <x-components::image :src="$product->assetImage()" :alt="$product->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($product->pet)
                                        <x-components::link :href="route('cms.pet.view', [
                                            'pet' => $product->pet->id,
                                        ])" :text="$product->pet->translate_name" />

                                        <x-components::link.external-link :href="route('pet.view', [
                                            'slug' => $product->pet->slug,
                                        ])" />
                                    @endif
                                </td>
                                <td>
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
                                </td>
                                <td>
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
                                </td>
                                <td class="text-wrap">
                                    {{ $product->name }}

                                    <x-components::link.external-link :href="route('product.view', [
                                        'slug' => $product->slug,
                                    ])" />
                                </td>
                                <td class="text-wrap">
                                    {{ $product->name_idn }}

                                    <x-components::link.external-link :href="route('product.view', [
                                        'slug' => $product->slug,
                                    ])" />
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($product->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($product->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Product Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.product.restore', [
                                                    'product' => $product->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Product Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.product.delete-permanent', [
                                                        'product' => $product->id,
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

            {{ $products->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
