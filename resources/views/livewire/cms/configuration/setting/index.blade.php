@section('title', trans('index.setting'))
@section('icon', 'fas fa-gear')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'key'" :title="trans('validation.attributes.key')" :icon="'fas fa-key'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'value'" :title="trans('validation.attributes.value')" :icon="'fas fa-file-lines'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.is-active />
                </div>
            </div>

            <div class="row mt-2">
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
                @can('Setting Add')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-button.add :href="route('cms.configuration.setting.add')" />
                    </div>
                @endcan

                @can('Setting Trash')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-button.trash :href="route('cms.configuration.setting.trash')" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th>{{ trans('index.key') }}</th>
                            <th>{{ trans('index.value') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($settings as $setting)
                            <tr wire:key="{{ $setting->id }}">
                                <td class="text-center">
                                    {{ ($settings->currentPage() - 1) * $settings->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <a draggable="false" class="btn btn-link text-decoration-none"
                                        href="{{ route('cms.configuration.setting.view', ['setting' => $setting->id]) }}">
                                        {{ $setting->id }}
                                    </a>
                                </td>
                                <td class="text-wrap">{{ $setting->key }}</td>
                                <td class="text-wrap">{!! $setting->value !!}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Str::successdanger($setting->is_active) }}">
                                        {{ Str::translate(Str::yesno($setting->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Setting View')
                                            <li>
                                                <x-button.view :class="'dropdown-item'" :href="route('cms.configuration.setting.view', [
                                                    'setting' => $setting->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Setting Clone')
                                            <li>
                                                <x-button.clone :class="'dropdown-item'" :href="route('cms.configuration.setting.clone', [
                                                    'setting' => $setting->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Setting Edit')
                                            <li>
                                                <x-button.edit :class="'dropdown-item'" :href="route('cms.configuration.setting.edit', [
                                                    'setting' => $setting->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Setting Active')
                                            <li>
                                                <x-button.active :class="'dropdown-item'" :href="route('cms.configuration.setting.active', [
                                                    'setting' => $setting->id,
                                                ])" :value="$setting->is_active" />
                                            </li>
                                        @endcan
                                        @can('Setting Delete')
                                            <li>
                                                <x-button.delete :class="'dropdown-item'" :href="route('cms.configuration.setting.delete', [
                                                    'setting' => $setting->id,
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

            {{ $settings->links('layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
