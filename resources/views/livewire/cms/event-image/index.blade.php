@section('title', trans('index.event_image'))
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
                    <x-components::search.select :key="'event_id'" :title="trans('validation.attributes.event_id')" :icon="'fas fa-calendar'"
                        :datas="$events" />
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
                @can('Event Image Add')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.add :href="route('cms.event-image.add')" />
                    </div>
                @endcan

                @can('Event Image Trash')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.trash :href="route('cms.event-image.trash')" />
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
                            <th>{{ trans('index.event') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($eventImages as $eventImage)
                            <tr wire:key="{{ $eventImage->id }}">
                                <td class="text-center">
                                    {{ ($eventImages->currentPage() - 1) * $eventImages->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.event-image.view', [
                                        'eventImage' => $eventImage->id,
                                    ])" :text="$eventImage->id" />
                                </td>
                                <td>
                                    @if ($eventImage->checkImage())
                                        <x-components::image :src="$eventImage->assetImage()" :alt="$eventImage->altImage()" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    @if ($eventImage->event)
                                        <x-components::link :href="route('cms.event.view', [
                                            'event' => $eventImage->event->id,
                                        ])" :text="$eventImage->event->name" />

                                        <x-components::link.external-link :href="route('event.view', [
                                            'slug' => $eventImage->event->slug,
                                        ])" />
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($eventImage->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($eventImage->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Event Image View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.event-image.view', [
                                                    'eventImage' => $eventImage->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Event Image Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.event-image.clone', [
                                                    'eventImage' => $eventImage->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Event Image Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.event-image.edit', [
                                                    'eventImage' => $eventImage->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Event Image Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.event-image.active', [
                                                    'eventImage' => $eventImage->id,
                                                ])"
                                                    :value="$eventImage->is_active" />
                                            </li>
                                        @endcan
                                        @can('Event Image Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.event-image.delete', [
                                                    'eventImage' => $eventImage->id,
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

            {{ $eventImages->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
