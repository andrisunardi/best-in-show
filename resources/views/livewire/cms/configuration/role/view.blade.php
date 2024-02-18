@section('title', trans('index.view') . ' - ' . trans('index.role'))
@section('icon', 'fas fa-eye')

<main>
    <div class="card mb-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.role') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.configuration.role.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $role->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $role->name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.guard_name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $role->guard_name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.total') }} {{ trans('index.permission') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="route('cms.configuration.permission.index', ['role_id' => $role->id])" :text="$role->permissions->count()" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.total') }} {{ trans('index.user') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="route('cms.configuration.user.index', ['role_id' => $role->id])" :text="$role->users->count()" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($role->created_at)
                        {{ $role->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $role->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($role->updated_at)
                        {{ $role->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $role->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mt-3">
                @can('Role Clone')
                    <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                        <x-components::link.clone :href="route('cms.configuration.role.clone', [
                            'role' => $role->id,
                        ])" />
                    </div>
                @endcan

                @can('Role Edit')
                    <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                        <x-components::link.edit :href="route('cms.configuration.role.edit', [
                            'role' => $role->id,
                        ])" />
                    </div>
                @endcan

                @can('Role Delete')
                    <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                        <x-components::link.delete :href="route('cms.configuration.role.delete', [
                            'role' => $role->id,
                        ])" />
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</main>
