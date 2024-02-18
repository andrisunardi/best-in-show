@section('title', trans('index.profile'))
@section('icon', 'fas fa-user-circle')

<main>
    @include('livewire.cms.profile.menu')

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <span class="@yield('icon') fa-fw"></span>
                    @yield('title')
                </div>

                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.role') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->getRoleNames()->join(', ') }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.name') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->name }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.email') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            <x-components::link.email :value="Auth::user()->email" />
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.phone') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            <x-components::link.phone :value="Auth::user()->phone" />
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.username') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->username }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.active') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            <span class="{{ 'badge bg-' . Utils::successDanger(Auth::user()->is_active) }}">
                                {{ Utils::translate(Utils::active(Auth::user()->is_active)) }}
                            </span>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.created_by') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            @if (Auth::user()->createdBy)
                                <x-components::link :text="Auth::user()->createdBy->name" :href="route('cms.configuration.user.view', [
                                    'user' => Auth::user()->createdBy->id,
                                ])" />
                            @endif
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.updated_by') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            @if (Auth::user()->updatedBy)
                                <x-components::link :text="Auth::user()->updatedBy->name" :href="route('cms.configuration.user.view', [
                                    'user' => Auth::user()->updatedBy->id,
                                ])" />
                            @endif
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.created_at') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->created_at?->isoFormat('LLLL') }}
                            ({{ Auth::user()->created_at?->diffForHumans() }})
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans('index.updated_at') }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->updated_at?->isoFormat('LLLL') }}
                            ({{ Auth::user()->updated_at?->diffForHumans() }})
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-primary"></div>

            </div>
        </div>

        <div class="col-xl-6">
            @if ($lastActivity)
                <div class="card mb-4">

                    <div class="card-header text-white bg-primary">
                        <span class="fas fa-clock fa-fw"></span>
                        {{ trans('index.last_activity') }}
                    </div>

                    <div class="card-body">
                        <div class="list-group">
                            <button class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-capitalize">
                                        {{ $lastActivity->log_name }} - {{ $lastActivity->subject_id }} -
                                        {{ $lastActivity->subject?->name }}
                                    </h5>
                                    <small>{{ Utils::translate($lastActivity->event) }}</small>
                                </div>
                                <p class="mb-1">{!! $lastActivity->description !!}</p>
                                <div><small>{{ $lastActivity->causer?->name }}</small></div>
                                <small>
                                    {{ $lastActivity->created_at->isoFormat('LLLL') }}
                                    {{ $lastActivity->created_at->diffForHumans() }}
                                </small>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        @if (Arr::exists($lastActivity->changes, ['old']))
                                            <h6>{{ trans('index.old') }}</h6>
                                            <pre><code>{{ json_encode($lastActivity->changes['old'], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if (Arr::exists($lastActivity->changes, ['attributes']))
                                            <h6>{{ trans('index.attributes') }}</h6>
                                            <pre><code>{{ json_encode($lastActivity->changes['attributes'], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="card-footer bg-primary"></div>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header text-white bg-primary">
                    <span class="fas fa-key fa-fw"></span>
                    {{ trans('index.roles_and_permissions') }}
                </div>

                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        @foreach (Auth::user()->loadMissing(['roles.permissions'])->roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">
                                        <x-components::link :text="$role->name" :href="route('cms.configuration.role.view', ['role' => $role->id])" />
                                    </div>
                                    @foreach ($role->permissions as $permission)
                                        <div>
                                            {{ $loop->iteration }}.
                                            <x-components::link :text="$permission->name" :href="route('cms.configuration.permission.view', [
                                                'permission' => $permission->id,
                                            ])" />
                                        </div>
                                    @endforeach
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $role->permissions->count() }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="card-footer bg-primary"></div>
            </div>
        </div>
    </div>
</main>
