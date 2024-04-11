@section('title', trans('index.trash') . ' - ' . trans('index.event_video'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.event_video') }}
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

        <div class="card-footer bg-danger-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.event_video') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-12 col-sm-auto">
                    <x-components::link.back :href="route('cms.event-video.index')" />
                </div>

                @can('Event Video Restore')
                    @if ($eventVideos->count())
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore-all :href="route('cms.event-video.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Event Video Delete Permanent')
                    @if ($eventVideos->count())
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent-all :href="route('cms.event-video.delete-permanent-all')" />
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
                            <th>{{ trans('index.video') }}</th>
                            <th>{{ trans('index.event') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($eventVideos as $eventVideo)
                            <tr wire:key="{{ $eventVideo->id }}">
                                <td class="text-center">
                                    {{ ($eventVideos->currentPage() - 1) * $eventVideos->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.event-video.view', [
                                        'eventVideo' => $eventVideo->id,
                                    ])" :text="$eventVideo->id" />
                                </td>
                                <td>
                                    @if ($eventVideo->checkVideo())
                                        <x-components::video :src="$eventVideo->assetVideo()" :alt="$eventVideo->altVideo()" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    @if ($eventVideo->event)
                                        <x-components::link :href="route('cms.event.view', [
                                            'event' => $eventVideo->event->id,
                                        ])" :text="$eventVideo->event->name" />

                                        <x-components::link.external-link :href="route('event.view', [
                                            'slug' => $eventVideo->event->slug,
                                        ])" />
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($eventVideo->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($eventVideo->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Event Video Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.event-video.restore', [
                                                    'eventVideo' => $eventVideo->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Event Video Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.event-video.delete-permanent', [
                                                        'eventVideo' => $eventVideo->id,
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

            {{ $eventVideos->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
