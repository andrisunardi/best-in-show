@section('title', trans('index.slider'))
@section('icon', 'fas fa-images')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.is-active />
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
            <div class="row">
                @can('Slider Add')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.add :href="route('cms.slider.add')" />
                    </div>
                @endcan

                @can('Slider Trash')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.trash :href="route('cms.slider.trash')" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th>{{ trans('index.image') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr wire:key="{{ $slider->id }}">
                                <td class="text-center">
                                    {{ ($sliders->currentPage() - 1) * $sliders->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.slider.view', [
                                        'slider' => $slider->id,
                                    ])" :text="$slider->id" />
                                </td>
                                <td>
                                    @if ($slider->checkImage())
                                        <x-components::image :src="$slider->assetImage()" :alt="$slider->altImage()" />
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($slider->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($slider->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Slider View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.slider.view', [
                                                    'slider' => $slider->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Slider Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.slider.clone', [
                                                    'slider' => $slider->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Slider Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.slider.edit', [
                                                    'slider' => $slider->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Slider Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.slider.active', [
                                                    'slider' => $slider->id,
                                                ])"
                                                    :value="$slider->is_active" />
                                            </li>
                                        @endcan
                                        @can('Slider Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.slider.delete', [
                                                    'slider' => $slider->id,
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

            {{ $sliders->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
