@section('title', trans('index.banner'))
@section('icon', 'fas fa-images')

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
                    <x-components::search :key="'link'" :title="trans('validation.attributes.link')" :icon="'fas fa-link'" />
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
                @can('Banner Add')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.add :href="route('cms.banner.add')" />
                    </div>
                @endcan

                @can('Banner Trash')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.trash :href="route('cms.banner.trash')" />
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
                            <th>{{ trans('index.link') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($banners as $banner)
                            <tr wire:key="{{ $banner->id }}">
                                <td class="text-center">
                                    {{ ($banners->currentPage() - 1) * $banners->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.banner.view', [
                                        'banner' => $banner->id,
                                    ])" :text="$banner->id" />
                                </td>
                                <td>
                                    @if ($banner->checkImage())
                                        <x-components::image :src="$banner->assetImage()" :alt="$banner->altImage()" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    @if ($banner->pet)
                                        <x-components::link :href="route('cms.pet.view', [
                                            'pet' => $banner->pet->id,
                                        ])" :text="$banner->pet->translate_name" />

                                        <x-components::link.external-link :href="route('pet.view', [
                                            'slug' => $banner->pet->slug,
                                        ])" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    @if ($banner->link)
                                        <x-components::link.external-link :href="$banner->link" :text="$banner->link"
                                            :target="'_blank'" :navigate="false" />
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($banner->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($banner->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Banner View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.banner.view', [
                                                    'banner' => $banner->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Banner Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.banner.clone', [
                                                    'banner' => $banner->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Banner Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.banner.edit', [
                                                    'banner' => $banner->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Banner Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.banner.active', [
                                                    'banner' => $banner->id,
                                                ])"
                                                    :value="$banner->is_active" />
                                            </li>
                                        @endcan
                                        @can('Banner Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.banner.delete', [
                                                    'banner' => $banner->id,
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

            {{ $banners->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
