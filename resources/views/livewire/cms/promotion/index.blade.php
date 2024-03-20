@section('title', trans('index.promotion'))
@section('icon', 'fas fa-newspaper')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
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
                    <x-components::search.date />
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
            <div class="row">
                @can('Promotion Add')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.add :href="route('cms.promotion.add')" />
                    </div>
                @endcan

                @can('Promotion Trash')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.trash :href="route('cms.promotion.trash')" />
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
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.name_idn') }}</th>
                            <th width="1%">{{ trans('index.date') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($promotions as $promotion)
                            <tr wire:key="{{ $promotion->id }}">
                                <td class="text-center">
                                    {{ ($promotions->currentPage() - 1) * $promotions->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.promotion.view', ['promotion' => $promotion->id])" :text="$promotion->id" />
                                </td>
                                <td>
                                    @if ($promotion->checkImage())
                                        <x-components::image :src="$promotion->assetImage()" :alt="$promotion->altImage()" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $promotion->name }}
                                    <x-components::link.external-link :href="route('promotion.view', ['slug' => $promotion->slug])" />
                                </td>
                                <td class="text-wrap">
                                    {{ $promotion->name_idn }}
                                    <x-components::link.external-link :href="route('promotion.view', ['slug' => $promotion->slug])" />
                                </td>
                                <td class="text-center">
                                    {{ $promotion->date?->isoFormat('LL') }}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($promotion->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($promotion->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Promotion View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.promotion.view', [
                                                    'promotion' => $promotion->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Promotion Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.promotion.clone', [
                                                    'promotion' => $promotion->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Promotion Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.promotion.edit', [
                                                    'promotion' => $promotion->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Promotion Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.promotion.active', [
                                                    'promotion' => $promotion->id,
                                                ])"
                                                    :value="$promotion->is_active" />
                                            </li>
                                        @endcan
                                        @can('Promotion Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.promotion.delete', [
                                                    'promotion' => $promotion->id,
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

            {{ $promotions->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
