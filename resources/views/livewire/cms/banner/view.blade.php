@section('title', trans('index.view') . ' - ' . trans('index.banner'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $banner->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.banner') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.banner.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $banner->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($banner->checkImage())
                        <x-components::image :src="$banner->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$banner->assetImage()" />
                            </div>
                            @can('Banner Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.banner.delete-image', [
                                        'banner' => $banner->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.pet') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($banner->pet)
                        <x-components::link :href="route('cms.pet.view', [
                            'pet' => $banner->pet->id,
                        ])" :text="$banner->pet->translate_name" />

                        <x-components::link.external-link :href="route('pet.view', [
                            'slug' => $banner->pet->slug,
                        ])" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.link') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($banner->link)
                        <x-components::link.external-link :href="$banner->link" :text="$banner->link" :target="'_blank'"
                            :navigate="false" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($banner->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($banner->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($banner->createdBy)
                        <x-components::link.user :data="$banner->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($banner->updatedBy)
                        <x-components::link.user :data="$banner->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($banner->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($banner->deletedBy)
                            <x-components::link.user :data="$banner->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($banner->created_at)
                        {{ $banner->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $banner->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($banner->updated_at)
                        {{ $banner->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $banner->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($banner->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($banner->deleted_at)
                            {{ $banner->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $banner->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($banner->trashed())
                    @can('Banner Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.banner.restore', [
                                'banner' => $banner->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Banner Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.banner.delete-permanent', [
                                'banner' => $banner->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Banner Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.banner.active', [
                                'banner' => $banner->id,
                            ])" :value="$banner->is_active" />
                        </div>
                    @endcan

                    @can('Banner Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.banner.clone', [
                                'banner' => $banner->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Banner Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.banner.edit', [
                                'banner' => $banner->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Banner Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.banner.delete', [
                                'banner' => $banner->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $banner->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
