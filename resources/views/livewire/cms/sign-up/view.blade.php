@section('title', trans('index.view') . ' - ' . trans('index.sign_up'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $signUp->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.sign_up') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.sign-up.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $signUp->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.email') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link.email :value="$signUp->email" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($signUp->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($signUp->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($signUp->createdBy)
                        <x-components::link.user :data="$signUp->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($signUp->updatedBy)
                        <x-components::link.user :data="$signUp->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($signUp->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($signUp->deletedBy)
                            <x-components::link.user :data="$signUp->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($signUp->created_at)
                        {{ $signUp->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $signUp->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($signUp->updated_at)
                        {{ $signUp->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $signUp->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($signUp->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($signUp->deleted_at)
                            {{ $signUp->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $signUp->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row g-3">
                @if ($signUp->trashed())
                    @can('Sign Up Restore')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore :href="route('cms.sign-up.restore', [
                                'signUp' => $signUp->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Sign Up Delete Permanent')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent :href="route('cms.sign-up.delete-permanent', [
                                'signUp' => $signUp->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Sign Up Active')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.active :href="route('cms.sign-up.active', [
                                'signUp' => $signUp->id,
                            ])" :value="$signUp->is_active" />
                        </div>
                    @endcan

                    @can('Sign Up Clone')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.clone :href="route('cms.sign-up.clone', [
                                'signUp' => $signUp->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Sign Up Edit')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.edit :href="route('cms.sign-up.edit', [
                                'signUp' => $signUp->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Sign Up Delete')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.delete :href="route('cms.sign-up.delete', [
                                'signUp' => $signUp->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $signUp->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
