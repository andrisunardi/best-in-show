@section('title', trans('index.trash') . ' - ' . trans('index.user'))
@section('icon', 'fas fa-dumpster')

<main>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-id-card'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'email'" :title="trans('validation.attributes.email')" :icon="'fas fa-envelope'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'phone'" :title="trans('validation.attributes.phone')" :icon="'fas fa-phone'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'username'" :title="trans('validation.attributes.username')" :icon="'fas fa-user'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.select :key="'role_id'" :title="trans('validation.attributes.role_id')" :icon="'fas fa-briefcase'" :datas="$roles" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.select :key="'permission_name'" :title="trans('validation.attributes.permission_name')" :icon="'fas fa-key'" :datas="$permissions"
                        :valueAttribute="'name'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.is-active />
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <x-form.reset :text="trans('index.reset_filter')" />
                </div>
            </div>
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.user') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-link.back :href="route('cms.configuration.user.index')" />
                </div>

                @can('User Restore')
                    @if ($users->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-link.restore-all :href="route('cms.configuration.user.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('User Delete Permanent')
                    @if ($users->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-link.delete-permanent-all :href="route('cms.configuration.user.delete-permanent-all')" />
                        </div>
                    @endif
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th width="1%">{{ trans('index.image') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.email') }}</th>
                            <th>{{ trans('index.phone') }}</th>
                            <th>{{ trans('index.username') }}</th>
                            <th>{{ trans('index.role') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr wire:key="{{ $user->id }}">
                                <td class="text-center">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-link.id :href="route('cms.configuration.user.view', ['user' => $user->id])" :text="$user->id" />
                                </td>
                                <td>
                                    @if ($user->checkImage())
                                        <x-image :src="$user->assetImage()" :alt="$user->altImage()" />
                                    @endif
                                </td>
                                <td class="text-wrap">{{ $user->name }}</td>
                                <td class="text-wrap">
                                    <x-link.email :value="$user->email" />
                                </td>
                                <td class="text-wrap">
                                    <x-link.phone :value="$user->phone" />
                                </td>
                                <td class="text-wrap">{{ $user->username }}</td>
                                <td class="text-wrap">
                                    @foreach ($user->roles as $role)
                                        <div>
                                            {{ $loop->iteration }}.
                                            <x-link.relation :text="$role->name" :href="route('cms.configuration.role.view', ['role' => $role->id])" />
                                        </div>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Str::successDanger($user->is_active) }}">
                                        {{ Str::translate(Str::yesNo($user->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('User Restore')
                                            <li>
                                                <x-link.restore :class="'dropdown-item'" :href="route('cms.configuration.user.restore', [
                                                    'user' => $user->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('User Delete Permanent')
                                            <li>
                                                <x-link.delete-permanent :class="'dropdown-item'" :href="route('cms.configuration.user.delete-permanent', [
                                                    'user' => $user->id,
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

            {{ $users->links('components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</main>
