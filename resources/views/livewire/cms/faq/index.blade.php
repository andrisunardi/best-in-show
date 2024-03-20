@section('title', trans('index.faq'))
@section('icon', 'fas fa-question')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'question'" :title="trans('validation.attributes.question')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'question_idn'" :title="trans('validation.attributes.question_idn')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'answer'" :title="trans('validation.attributes.answer')" :icon="'fas fa-file-lines'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'answer_idn'" :title="trans('validation.attributes.answer_idn')" :icon="'fas fa-file-lines'" />
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

        <div class="card-footer bg-primary-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                @can('Faq Add')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.add :href="route('cms.faq.add')" />
                    </div>
                @endcan

                @can('Faq Trash')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.trash :href="route('cms.faq.trash')" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th>{{ trans('index.question') }}</th>
                            <th>{{ trans('index.question_idn') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                            <tr wire:key="{{ $faq->id }}">
                                <td class="text-center">
                                    {{ ($faqs->currentPage() - 1) * $faqs->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.faq.view', ['faq' => $faq->id])" :text="$faq->id" />
                                </td>
                                <td class="text-wrap">{{ $faq->question }}</td>
                                <td class="text-wrap">{{ $faq->question_idn }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($faq->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($faq->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Faq View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.faq.view', [
                                                    'faq' => $faq->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Faq Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.faq.clone', [
                                                    'faq' => $faq->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Faq Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.faq.edit', [
                                                    'faq' => $faq->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Faq Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.faq.active', [
                                                    'faq' => $faq->id,
                                                ])" :value="$faq->is_active" />
                                            </li>
                                        @endcan
                                        @can('Faq Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.faq.delete', [
                                                    'faq' => $faq->id,
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

            {{ $faqs->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
