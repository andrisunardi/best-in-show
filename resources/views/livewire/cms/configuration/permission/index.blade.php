@section('title', trans('index.permission'))
@section('icon', 'fas fa-key')

<main>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.select :key="'role_id'" :title="trans('validation.attributes.role_id')" :icon="'fas fa-briefcase'"
                        :datas="$roles" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-key'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'guard_name'" :title="trans('validation.attributes.guard_name')" :icon="'fas fa-shield'" />
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <x-components::form.reset :text="trans('index.reset_filter')" />
                </div>
            </div>
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                @can('Permission Add')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.add :href="route('cms.configuration.permission.add')" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th width="1%">{{ trans('index.guard_name') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('index.role') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('index.user') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr wire:key="{{ $permission->id }}">
                                <td class="text-center">
                                    {{ ($permissions->currentPage() - 1) * $permissions->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.permission.view', [
                                        'permission' => $permission->id,
                                    ])" :text="$permission->id" />
                                </td>
                                <td class="text-wrap">{{ $permission->name }}</td>
                                <td class="text-center">{{ $permission->guard_name }}</td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.role.index', [
                                        'permission_id' => $permission->id,
                                    ])" :text="$permission->roles->count()" />
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.user.index', [
                                        'permission_id' => $permission->id,
                                    ])" :text="$permission->users->count()" />
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Permission View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.configuration.permission.view', [
                                                    'permission' => $permission->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Permission Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.configuration.permission.clone', [
                                                    'permission' => $permission->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Permission Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.configuration.permission.edit', [
                                                    'permission' => $permission->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Permission Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.configuration.permission.delete', [
                                                    'permission' => $permission->id,
                                                ])" />
                                            </li>
                                        @endcan
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">
                                    {{ trans('index.no_data_available') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $permissions->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</main>
