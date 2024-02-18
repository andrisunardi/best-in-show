@section('title', trans('index.trash') . ' - ' . trans('index.setting'))
@section('icon', 'fas fa-dumpster')

<main>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.setting') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'key'" :title="trans('validation.attributes.key')" :icon="'fas fa-key'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'value'" :title="trans('validation.attributes.value')" :icon="'fas fa-file-lines'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search.is-active />
                </div>
            </div>

            <div class="row mt-2">
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
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.setting') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.configuration.setting.index')" />
                </div>

                @can('Setting Restore')
                    @if ($settings->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.restore-all :href="route('cms.configuration.setting.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Setting Delete Permanent')
                    @if ($settings->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.delete-permanent-all :href="route('cms.configuration.setting.delete-permanent-all')" />
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
                                    <x-components::link :href="route('cms.configuration.setting.view', ['setting' => $setting->id])" :text="$setting->id" />
                                </td>
                                <td class="text-wrap">{{ $setting->key }}</td>
                                <td class="text-wrap">{!! $setting->value !!}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($setting->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($setting->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Setting Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.configuration.setting.restore', [
                                                    'setting' => $setting->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Setting Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'" :href="route('cms.configuration.setting.delete-permanent', [
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

            {{ $settings->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</main>
