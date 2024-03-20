@section('title', trans('index.view') . ' - ' . trans('index.event'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $event->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.event') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.event.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $event->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($event->checkImage())
                        <x-components::image :src="$event->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$event->assetImage()" />
                            </div>
                            @can('Event Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.event.delete-image', [
                                        'event' => $event->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.video') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($event->checkVideo())
                        <x-components::video :src="$event->assetVideo()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$event->assetVideo()" />
                            </div>
                            @can('Event Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.event.delete-video', [
                                        'event' => $event->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $event->name }}
                    <x-components::link.external-link :href="route('event.view', ['slug' => $event->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $event->name_idn }}
                    <x-components::link.external-link :href="route('event.view', ['slug' => $event->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $event->description !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $event->description_idn !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.date') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($event->date)
                        {{ $event->date->isoFormat('LL') }}
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.location') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $event->location }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($event->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($event->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($event->createdBy)
                        <x-components::link.user :data="$event->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($event->updatedBy)
                        <x-components::link.user :data="$event->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($event->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($event->deletedBy)
                            <x-components::link.user :data="$event->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($event->created_at)
                        {{ $event->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $event->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($event->updated_at)
                        {{ $event->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $event->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($event->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($event->deleted_at)
                            {{ $event->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $event->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($event->trashed())
                    @can('Event Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.event.restore', [
                                'event' => $event->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.event.delete-permanent', [
                                'event' => $event->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Event Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.event.active', [
                                'event' => $event->id,
                            ])" :value="$event->is_active" />
                        </div>
                    @endcan

                    @can('Event Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.event.clone', [
                                'event' => $event->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.event.edit', [
                                'event' => $event->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Event Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.event.delete', [
                                'event' => $event->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $event->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
