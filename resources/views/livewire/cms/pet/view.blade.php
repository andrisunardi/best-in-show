@section('title', trans('index.view') . ' - ' . trans('index.pet'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $pet->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.pet') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.pet.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $pet->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($pet->checkImage())
                        <x-components::image :src="$pet->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$pet->assetImage()" />
                            </div>
                            @can('Pet Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.pet.delete-image', [
                                        'pet' => $pet->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.product_image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($pet->checkProductImage())
                        <x-components::image :src="$pet->assetProductImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$pet->assetProductImage()" />
                            </div>
                            @can('Pet Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.pet.delete-product-image', [
                                        'pet' => $pet->id,
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
                    {{ $pet->name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $pet->name_idn }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($pet->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($pet->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($pet->createdBy)
                        <x-components::link.user :data="$pet->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($pet->updatedBy)
                        <x-components::link.user :data="$pet->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($pet->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($pet->deletedBy)
                            <x-components::link.user :data="$pet->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($pet->created_at)
                        {{ $pet->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $pet->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($pet->updated_at)
                        {{ $pet->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $pet->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($pet->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($pet->deleted_at)
                            {{ $pet->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $pet->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($pet->trashed())
                    @can('Pet Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.pet.restore', [
                                'pet' => $pet->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Pet Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.pet.delete-permanent', [
                                'pet' => $pet->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Pet Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.pet.active', [
                                'pet' => $pet->id,
                            ])" :value="$pet->is_active" />
                        </div>
                    @endcan

                    @can('Pet Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.pet.clone', [
                                'pet' => $pet->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Pet Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.pet.edit', [
                                'pet' => $pet->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Pet Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.pet.delete', [
                                'pet' => $pet->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $pet->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
