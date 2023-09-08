@section('title', trans('index.user'))
@section('icon', 'fas fa-user')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-id-card'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'username'" :title="trans('validation.attributes.username')" :icon="'fas fa-user'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'email'" :title="trans('validation.attributes.email')" :icon="'fas fa-envelope'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'phone'" :title="trans('validation.attributes.phone')" :icon="'fas fa-phone'" />
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

        <div class="card-footer bg-primary-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                @can('User Add')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-button.add :href="route('cms.configuration.user.add')" />
                    </div>
                @endcan

                @can('User Trash')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-button.trash :href="route('cms.configuration.user.trash')" />
                    </div>
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
                            <th>{{ trans('index.username') }}</th>
                            <th>{{ trans('index.email') }}</th>
                            <th>{{ trans('index.phone') }}</th>
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
                                    <a draggable="false" class="btn btn-link text-decoration-none"
                                        href="{{ route('cms.configuration.user.view', ['user' => $user->id]) }}">
                                        {{ $user->id }}
                                    </a>
                                </td>
                                <td>
                                    @if ($user->checkImage())
                                        <a draggable="false" href="{{ $user->assetImage() }}" target="_blank">
                                            <img draggable="false" class="w-100" src="{{ $user->assetImage() }}"
                                                alt="{{ $user->altImage() }}">
                                        </a>
                                    @endif
                                </td>
                                <td class="text-wrap">{{ $user->name }}</td>
                                <td class="text-wrap">{{ $user->username }}</td>
                                <td class="text-wrap">
                                    <a draggable="false" href="mailto:{{ $user->email }}">
                                        {{ $user->email }}
                                    </a>
                                </td>
                                <td class="text-wrap">
                                    <a draggable="false" href="tel:+{{ Str::phone($user->phone) }}">
                                        {{ $user->phone }}
                                    </a>
                                </td>
                                <td class="text-wrap">
                                    @foreach ($user->roles as $role)
                                        <div>
                                            {{ $loop->iteration }}.
                                            <a draggable="false"
                                                href="{{ route('cms.configuration.role.view', ['role' => $role->id]) }}"
                                                target="_blank">
                                                {{ $role->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Str::successdanger($user->is_active) }}">
                                        {{ Str::translate(Str::yesno($user->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('User View')
                                            <li>
                                                <x-button.view :class="'dropdown-item'" :href="route('cms.configuration.user.view', [
                                                    'user' => $user->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('User Clone')
                                            <li>
                                                <x-button.clone :class="'dropdown-item'" :href="route('cms.configuration.user.clone', [
                                                    'user' => $user->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('User Edit')
                                            <li>
                                                <x-button.edit :class="'dropdown-item'" :href="route('cms.configuration.user.edit', [
                                                    'user' => $user->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('User Active')
                                            <li>
                                                <x-button.active :class="'dropdown-item'" :href="route('cms.configuration.user.active', [
                                                    'user' => $user->id,
                                                ])" :value="$user->is_active" />
                                            </li>
                                        @endcan
                                        @can('User Delete')
                                            <li>
                                                <x-button.delete :class="'dropdown-item'" :href="route('cms.configuration.user.delete', [
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

            {{ $users->links('layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
