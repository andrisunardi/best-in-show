@section('title', trans('index.trash') . ' - ' . trans('index.event'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.event') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name-idn'" :title="trans('validation.attributes.name-idn')" :icon="'fas fa-font'" />
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
                    <x-components::search :key="'location'" :title="trans('validation.attributes.location')" :icon="'fas fa-location-dot'" />
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
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.event') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.event.index')" />
                </div>

                @can('Event Restore')
                    @if ($events->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.restore-all :href="route('cms.event.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Event Delete Permanent')
                    @if ($events->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.delete-permanent-all :href="route('cms.event.delete-permanent-all')" />
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
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.name_idn') }}</th>
                            <th width="1%">{{ trans('index.date') }}</th>
                            <th width="1%">{{ trans('index.location') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr wire:key="{{ $event->id }}">
                                <td class="text-center">
                                    {{ ($events->currentPage() - 1) * $events->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.event.view', ['event' => $event->id])" :text="$event->id" />
                                </td>
                                <td>
                                    @if ($event->checkImage())
                                        <x-components::image :src="$event->assetImage()" :alt="$event->altImage()" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $event->name }}
                                    <x-components::link.external-link :href="route('event.view', ['slug' => $event->slug])" />
                                </td>
                                <td class="text-wrap">
                                    {{ $event->name_idn }}
                                    <x-components::link.external-link :href="route('event.view', ['slug' => $event->slug])" />
                                </td>
                                <td class="text-center">
                                    {{ $event->date?->isoFormat('LL') }}
                                </td>
                                <td class="text-wrap">
                                    {{ $event->location }}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($event->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($event->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Event Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.event.restore', [
                                                    'event' => $event->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Event Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.event.delete-permanent', [
                                                        'event' => $event->id,
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

            {{ $events->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
