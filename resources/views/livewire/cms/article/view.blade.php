@section('title', trans('index.view') . ' - ' . trans('index.article'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $article->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.article') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.article.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $article->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.image') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-4 col-xl-3">
                    @if ($article->checkImage())
                        <x-components::image :src="$article->assetImage()" />

                        <div class="row my-3">
                            <div class="col-6">
                                <x-components::link.download :href="$article->assetImage()" />
                            </div>
                            @can('Article Edit')
                                <div class="col-6">
                                    <x-components::link.delete :href="route('cms.article.delete-image', [
                                        'article' => $article->id,
                                    ])" />
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.title') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $article->title }}
                    <x-components::link.external-link :href="route('article.view', ['slug' => $article->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.title_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $article->title_idn }}
                    <x-components::link.external-link :href="route('article.view', ['slug' => $article->slug])" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $article->description !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.description_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $article->description_idn !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.date') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->date)
                        {{ $article->date->isoFormat('LL') }}
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($article->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($article->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->createdBy)
                        <x-components::link.user :data="$article->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->updatedBy)
                        <x-components::link.user :data="$article->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($article->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($article->deletedBy)
                            <x-components::link.user :data="$article->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->created_at)
                        {{ $article->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $article->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->updated_at)
                        {{ $article->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $article->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($article->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($article->deleted_at)
                            {{ $article->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $article->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row g-3">
                @if ($article->trashed())
                    @can('Article Restore')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore :href="route('cms.article.restore', [
                                'article' => $article->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Article Delete Permanent')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent :href="route('cms.article.delete-permanent', [
                                'article' => $article->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Article Active')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.active :href="route('cms.article.active', [
                                'article' => $article->id,
                            ])" :value="$article->is_active" />
                        </div>
                    @endcan

                    @can('Article Clone')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.clone :href="route('cms.article.clone', [
                                'article' => $article->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Article Edit')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.edit :href="route('cms.article.edit', [
                                'article' => $article->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Article Delete')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.delete :href="route('cms.article.delete', [
                                'article' => $article->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $article->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
