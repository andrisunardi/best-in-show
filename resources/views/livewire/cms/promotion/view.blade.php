@section('title', trans('index.view') . ' - ' . trans('index.promotion'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $promotion->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.promotion') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.promotion.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $promotion->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($promotion->checkImage())
                        <x-components::image :src="$promotion->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$promotion->assetImage()" />
                            </div>
                            @can('Promotion Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.promotion.delete-image', [
                                        'promotion' => $promotion->id,
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
                    {{ $promotion->name }}
                    <x-components::link.external-link :href="route('promotion.view', ['slug' => $promotion->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $promotion->name_idn }}
                    <x-components::link.external-link :href="route('promotion.view', ['slug' => $promotion->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $promotion->description !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $promotion->description_idn !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.date') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($promotion->date)
                        {{ $promotion->date->isoFormat('LL') }}
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($promotion->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($promotion->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($promotion->createdBy)
                        <x-components::link.user :data="$promotion->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($promotion->updatedBy)
                        <x-components::link.user :data="$promotion->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($promotion->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($promotion->deletedBy)
                            <x-components::link.user :data="$promotion->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($promotion->created_at)
                        {{ $promotion->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $promotion->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($promotion->updated_at)
                        {{ $promotion->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $promotion->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($promotion->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($promotion->deleted_at)
                            {{ $promotion->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $promotion->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row g-3">
                @if ($promotion->trashed())
                    @can('Promotion Restore')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore :href="route('cms.promotion.restore', [
                                'promotion' => $promotion->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Promotion Delete Permanent')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent :href="route('cms.promotion.delete-permanent', [
                                'promotion' => $promotion->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Promotion Active')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.active :href="route('cms.promotion.active', [
                                'promotion' => $promotion->id,
                            ])" :value="$promotion->is_active" />
                        </div>
                    @endcan

                    @can('Promotion Clone')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.clone :href="route('cms.promotion.clone', [
                                'promotion' => $promotion->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Promotion Edit')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.edit :href="route('cms.promotion.edit', [
                                'promotion' => $promotion->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Promotion Delete')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.delete :href="route('cms.promotion.delete', [
                                'promotion' => $promotion->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $promotion->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
