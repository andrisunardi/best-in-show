@section('title', trans('index.view') . ' - ' . trans('index.event_video'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $eventVideo->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.event_video') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.event-video.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $eventVideo->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.video') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($eventVideo->checkVideo())
                        <x-components::video :src="$eventVideo->assetVideo()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$eventVideo->assetVideo()" />
                            </div>
                            @can('Event Video Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.event-video.delete-video', [
                                        'eventVideo' => $eventVideo->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.event') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventVideo->event)
                        <x-components::link :href="route('cms.event.view', [
                            'event' => $eventVideo->event->id,
                        ])" :text="$eventVideo->event->name" />

                        <x-components::link.external-link :href="route('event.view', [
                            'slug' => $eventVideo->event->slug,
                        ])" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($eventVideo->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($eventVideo->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventVideo->createdBy)
                        <x-components::link.user :data="$eventVideo->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventVideo->updatedBy)
                        <x-components::link.user :data="$eventVideo->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($eventVideo->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($eventVideo->deletedBy)
                            <x-components::link.user :data="$eventVideo->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventVideo->created_at)
                        {{ $eventVideo->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $eventVideo->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventVideo->updated_at)
                        {{ $eventVideo->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $eventVideo->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($eventVideo->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($eventVideo->deleted_at)
                            {{ $eventVideo->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $eventVideo->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($eventVideo->trashed())
                    @can('Event Video Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.event-video.restore', [
                                'eventVideo' => $eventVideo->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Video Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.event-video.delete-permanent', [
                                'eventVideo' => $eventVideo->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Event Video Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.event-video.active', [
                                'eventVideo' => $eventVideo->id,
                            ])" :value="$eventVideo->is_active" />
                        </div>
                    @endcan

                    @can('Event Video Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.event-video.clone', [
                                'eventVideo' => $eventVideo->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Video Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.event-video.edit', [
                                'eventVideo' => $eventVideo->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Video Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.event-video.delete', [
                                'eventVideo' => $eventVideo->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $eventVideo->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
