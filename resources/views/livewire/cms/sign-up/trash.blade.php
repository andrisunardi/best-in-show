@section('title', trans('index.trash') . ' - ' . trans('index.sign_up'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.sign_up') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'email'" :title="trans('validation.attributes.email')" :icon="'fas fa-envelope'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search.is-active />
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <x-components::form.reset :text="trans('index.reset_filter')" />
                </div>
            </div>
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.sign_up') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.sign-up.index')" />
                </div>

                @can('Sign Up Restore')
                    @if ($signUps->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.restore-all :href="route('cms.sign-up.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Sign Up Delete Permanent')
                    @if ($signUps->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.delete-permanent-all :href="route('cms.sign-up.delete-permanent-all')" />
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
                            <th>{{ trans('index.email') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($signUps as $signUp)
                            <tr wire:key="{{ $signUp->id }}">
                                <td class="text-center">
                                    {{ ($signUps->currentPage() - 1) * $signUps->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.sign-up.view', ['signUp' => $signUp->id])" :text="$signUp->id" />
                                </td>
                                <td><x-components::link.email :value="$signUp->email" /></td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($signUp->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($signUp->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Sign Up Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.sign-up.restore', [
                                                    'signUp' => $signUp->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Sign Up Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.sign-up.delete-permanent', [
                                                        'signUp' => $signUp->id,
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

            {{ $signUps->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
