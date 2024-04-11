@section('title', trans('index.store'))
@section('icon', 'fas fa-store')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.enum :key="'category'" :title="trans('validation.attributes.category')" :icon="'fas fa-list'"
                        :datas="$storeCategories" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-user'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'address'" :title="trans('validation.attributes.address')" :icon="'fas fa-map-marked-alt'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'google_maps_iframe'" :title="trans('validation.attributes.google_maps_iframe')" :icon="'fas fa-code'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'google_maps'" :title="trans('validation.attributes.google_maps')" :icon="'fas fa-location-dot'" />
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
                @can('Store Add')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.add :href="route('cms.store.add')" />
                    </div>
                @endcan

                @can('Store Trash')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.trash :href="route('cms.store.trash')" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th>{{ trans('index.category') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.address') }}</th>
                            <th>{{ trans('index.google_maps_iframe') }}</th>
                            <th>{{ trans('index.google_maps') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stores as $store)
                            <tr wire:key="{{ $store->id }}">
                                <td class="text-center">
                                    {{ ($stores->currentPage() - 1) * $stores->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.store.view', [
                                        'store' => $store->id,
                                    ])" :text="$store->id" />
                                </td>
                                <td class="text-wrap">{{ Utils::translate($store->category?->name) }}</td>
                                <td class="text-wrap">{{ $store->name }}</td>
                                <td class="text-wrap">{{ $store->address }}</td>
                                <td>
                                    <iframe src="{{ $store->google_maps_iframe }}" class="w-100 h-100"
                                        allowfullscreen="" loading="lazy"></iframe>
                                </td>
                                <td>
                                    <x-components::link :href="$store->google_maps" :text="$store->google_maps" />
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($store->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($store->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Store View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.store.view', [
                                                    'store' => $store->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Store Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.store.clone', [
                                                    'store' => $store->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Store Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.store.edit', [
                                                    'store' => $store->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Store Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.store.active', [
                                                    'store' => $store->id,
                                                ])"
                                                    :value="$store->is_active" />
                                            </li>
                                        @endcan
                                        @can('Store Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.store.delete', [
                                                    'store' => $store->id,
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

            {{ $stores->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
