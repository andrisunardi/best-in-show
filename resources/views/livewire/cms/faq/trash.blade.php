@section('title', trans('index.trash') . ' - ' . trans('index.faq'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.faq') }}
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

        <div class="card-footer bg-danger-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.faq') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.faq.index')" />
                </div>

                @can('Faq Restore')
                    @if ($faqs->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.restore-all :href="route('cms.faq.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Faq Delete Permanent')
                    @if ($faqs->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.delete-permanent-all :href="route('cms.faq.delete-permanent-all')" />
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
                                        @can('Faq Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.faq.restore', [
                                                    'faq' => $faq->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Faq Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'" :href="route('cms.faq.delete-permanent', [
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

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
