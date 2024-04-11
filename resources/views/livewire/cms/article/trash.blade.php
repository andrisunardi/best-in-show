@section('title', trans('index.trash') . ' - ' . trans('index.article'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.article') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'title'" :title="trans('validation.attributes.title')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'title_idn'" :title="trans('validation.attributes.title_idn')" :icon="'fas fa-font'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'description'" :title="trans('validation.attributes.description')" :icon="'fas fa-file-text'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'description_idn'" :title="trans('validation.attributes.description_idn')" :icon="'fas fa-file-text'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.date />
                </div>

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

        <div class="card-footer bg-danger-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.article') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-12 col-sm-auto">
                    <x-components::link.back :href="route('cms.article.index')" />
                </div>

                @can('Article Restore')
                    @if ($articles->count())
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore-all :href="route('cms.article.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Article Delete Permanent')
                    @if ($articles->count())
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent-all :href="route('cms.article.delete-permanent-all')" />
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
                            <th>{{ trans('index.title') }}</th>
                            <th>{{ trans('index.title_idn') }}</th>
                            <th width="1%">{{ trans('index.date') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr wire:key="{{ $article->id }}">
                                <td class="text-center">
                                    {{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.article.view', ['article' => $article->id])" :text="$article->id" />
                                </td>
                                <td>
                                    @if ($article->checkImage())
                                        <x-components::image :src="$article->assetImage()" :alt="$article->altImage()" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    {{ $article->title }}
                                    <x-components::link.external-link :href="route('article.view', ['slug' => $article->slug])" />
                                </td>
                                <td class="text-wrap">
                                    {{ $article->title_idn }}
                                    <x-components::link.external-link :href="route('article.view', ['slug' => $article->slug])" />
                                </td>
                                <td class="text-center">
                                    {{ $article->date?->isoFormat('LL') }}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($article->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($article->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Article Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.article.restore', [
                                                    'article' => $article->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Article Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.article.delete-permanent', [
                                                        'article' => $article->id,
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

            {{ $articles->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
