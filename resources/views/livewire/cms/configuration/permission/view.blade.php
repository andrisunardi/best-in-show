@section('title', trans('index.view') . ' - ' . trans('index.permission'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.permission') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-link :class="'btn btn-primary w-100'" :text="trans('index.back')" :icon="'fas fa-arrow-left'" :href="route('cms.configuration.permission.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.guard_name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->guard_name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.total') }} {{ trans('index.role') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <a draggable="false" target="_blank"
                        href="{{ route('cms.configuration.role.index', ['permission_id' => $permission->id]) }}">
                        {{ $permission->roles->count() }}
                    </a>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.total') }} {{ trans('index.user') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <a draggable="false" target="_blank"
                        href="{{ route('cms.configuration.user.index', ['permission_id' => $permission->id]) }}">
                        {{ $permission->users->count() }}
                    </a>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($permission->created_at)
                        {{ $permission->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $permission->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($permission->updated_at)
                        {{ $permission->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $permission->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mt-3">
                @can('Permission Clone')
                    <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                        <x-button.clone :href="route('cms.configuration.permission.clone', [
                            'permission' => $permission->id,
                        ])" />
                    </div>
                @endcan

                @can('Permission Edit')
                    <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                        <x-button.edit :href="route('cms.configuration.permission.edit', [
                            'permission' => $permission->id,
                        ])" />
                    </div>
                @endcan

                @can('Permission Delete')
                    <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                        <x-button.delete :href="route('cms.configuration.permission.delete', [
                            'permission' => $permission->id,
                        ])" />
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
