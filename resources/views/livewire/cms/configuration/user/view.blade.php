@section('title', trans('index.view') . ' - ' . trans('index.user'))
@section('icon', 'fas fa-eye')

<main>
    <div class="card mb-3">
        <div class="card-header {{ $user->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.user') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.configuration.user.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $user->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($user->checkImage())
                        <x-components::image :src="$user->assetImage()" :alt="$user->altImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$user->assetImage()" />
                            </div>
                            @can('User Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.configuration.user.delete-image', [
                                        'user' => $user->id,
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
                    {{ $user->name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.email') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link.email :value="$user->email" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.phone') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link.phone :value="$user->phone" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.username') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $user->username }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($user->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($user->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.roles_and_permissions') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @foreach ($user->roles as $role)
                        <div>
                            {{ $loop->iteration }}.
                            <x-components::link.relation :text="$role->name" :href="route('cms.configuration.role.view', ['role' => $role->id])" />
                        </div>
                        @foreach ($role->permissions as $permission)
                            <div class="ms-3">
                                {{ $loop->iteration }}.
                                <x-components::link.relation :text="$permission->name" :href="route('cms.configuration.permission.view', [
                                    'permission' => $permission->id,
                                ])" />
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($user->createdBy)
                        <x-components::link.user :data="$user->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($user->updatedBy)
                        <x-components::link.user :data="$user->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($user->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($user->deletedBy)
                            <x-components::link.user :data="$user->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($user->created_at)
                        {{ $user->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $user->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($user->updated_at)
                        {{ $user->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $user->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($user->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($user->deleted_at)
                            {{ $user->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $user->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($user->trashed())
                    @can('User Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.configuration.user.restore', [
                                'user' => $user->id,
                            ])" />
                        </div>
                    @endcan

                    @can('User Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.configuration.user.delete-permanent', [
                                'user' => $user->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('User Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.configuration.user.active', [
                                'user' => $user->id,
                            ])" :value="$user->is_active" />
                        </div>
                    @endcan

                    @can('User Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.configuration.user.clone', [
                                'user' => $user->id,
                            ])" />
                        </div>
                    @endcan

                    @can('User Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.configuration.user.edit', [
                                'user' => $user->id,
                            ])" />
                        </div>
                    @endcan

                    @can('User Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.configuration.user.delete', [
                                'user' => $user->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $user->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</main>
