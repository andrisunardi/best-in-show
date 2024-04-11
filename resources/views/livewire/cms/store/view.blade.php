@section('title', trans('index.view') . ' - ' . trans('index.store'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $store->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.store') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.store.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $store->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.category') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ Utils::translate($store->category?->name) }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $store->name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.address') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $store->address }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.google_maps_iframe') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <iframe src="{{ $store->google_maps_iframe }}" class="w-100 h-100" allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.google_maps') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="$store->google_maps" :text="$store->google_maps" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($store->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($store->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($store->createdBy)
                        <x-components::link.user :data="$store->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($store->updatedBy)
                        <x-components::link.user :data="$store->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($store->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($store->deletedBy)
                            <x-components::link.user :data="$store->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($store->created_at)
                        {{ $store->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $store->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($store->updated_at)
                        {{ $store->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $store->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($store->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($store->deleted_at)
                            {{ $store->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $store->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row g-3">
                @if ($store->trashed())
                    @can('Store Restore')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore :href="route('cms.store.restore', [
                                'store' => $store->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Store Delete Permanent')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent :href="route('cms.store.delete-permanent', [
                                'store' => $store->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Store Active')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.active :href="route('cms.store.active', [
                                'store' => $store->id,
                            ])" :value="$store->is_active" />
                        </div>
                    @endcan

                    @can('Store Clone')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.clone :href="route('cms.store.clone', [
                                'store' => $store->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Store Edit')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.edit :href="route('cms.store.edit', [
                                'store' => $store->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Store Delete')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.delete :href="route('cms.store.delete', [
                                'store' => $store->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $store->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
