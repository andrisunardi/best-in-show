@section('title', trans('index.trash') . ' - ' . trans('index.pet'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.pet') }}
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
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.pet') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.pet.index')" />
                </div>

                @can('Pet Restore')
                    @if ($pets->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.restore-all :href="route('cms.pet.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Pet Delete Permanent')
                    @if ($pets->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.delete-permanent-all :href="route('cms.pet.delete-permanent-all')" />
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
                            <th width="1%">{{ trans('index.product_image') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.name_idn') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pets as $pet)
                            <tr wire:key="{{ $pet->id }}">
                                <td class="text-center">
                                    {{ ($pets->currentPage() - 1) * $pets->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.pet.view', ['pet' => $pet->id])" :text="$pet->id" />
                                </td>
                                <td>
                                    @if ($pet->checkImage())
                                        <x-components::image :src="$pet->assetImage()" :alt="$pet->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($pet->checkProductImage())
                                        <x-components::image :src="$pet->assetProductImage()" :alt="$pet->altProductImage()" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $pet->name }}
                                    <x-components::link.external-link :href="route('pet.view', ['slug' => $pet->slug])" />
                                </td>
                                <td class="text-wrap">
                                    {{ $pet->name_idn }}
                                    <x-components::link.external-link :href="route('pet.view', ['slug' => $pet->slug])" />
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($pet->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($pet->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Pet Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.pet.restore', [
                                                    'pet' => $pet->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Pet Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.pet.delete-permanent', [
                                                        'pet' => $pet->id,
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

            {{ $pets->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
