@section('title', trans('index.view') . ' - ' . trans('index.event_image'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $eventImage->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.event_image') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.event-image.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $eventImage->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($eventImage->checkImage())
                        <x-components::image :src="$eventImage->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$eventImage->assetImage()" />
                            </div>
                            @can('Event Image Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.event-image.delete-image', [
                                        'eventImage' => $eventImage->id,
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
                    @if ($eventImage->event)
                        <x-components::link :href="route('cms.event.view', [
                            'event' => $eventImage->event->id,
                        ])" :text="$eventImage->event->translate_name" />

                        <x-components::link.external-link :href="route('event.view', [
                            'slug' => $eventImage->event->slug,
                        ])" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($eventImage->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($eventImage->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventImage->createdBy)
                        <x-components::link.user :data="$eventImage->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventImage->updatedBy)
                        <x-components::link.user :data="$eventImage->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($eventImage->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($eventImage->deletedBy)
                            <x-components::link.user :data="$eventImage->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventImage->created_at)
                        {{ $eventImage->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $eventImage->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($eventImage->updated_at)
                        {{ $eventImage->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $eventImage->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($eventImage->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($eventImage->deleted_at)
                            {{ $eventImage->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $eventImage->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($eventImage->trashed())
                    @can('Event Image Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.event-image.restore', [
                                'eventImage' => $eventImage->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Image Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.event-image.delete-permanent', [
                                'eventImage' => $eventImage->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Event Image Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.event-image.active', [
                                'eventImage' => $eventImage->id,
                            ])" :value="$eventImage->is_active" />
                        </div>
                    @endcan

                    @can('Event Image Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.event-image.clone', [
                                'eventImage' => $eventImage->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Image Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.event-image.edit', [
                                'eventImage' => $eventImage->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Image Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.event-image.delete', [
                                'eventImage' => $eventImage->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $eventImage->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
