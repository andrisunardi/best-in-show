@section('title', $article->translate_title)
@section('icon', 'fas fa-eye')

<main>
    <section id="articleDetailBreadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <ol>
                    <li>
                        <a draggable="false" href="{{ route('index') }}" wire:navigate>
                            {{ trans('index.home') }}
                        </a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('article.index') }}" wire:navigate>
                            {{ trans('index.article') }}
                        </a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <span class="current">@yield('title')</span>
                    </li>
                </ol>
            </div>
            <div class="my-6">
                <hr class="border-t-2 border-primaryGray" />
            </div>
        </div>
    </section>

    <section id="articleDetailContent">
        <div class="container">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ $article->translate_title }}
                </h2>
            </div>

            <div class="mt-4 text-center">
                <h6 class="text-primaryGray text-sm font-poppins-r">
                    {{ $article->date->isoFormat('LL') }}
                </h6>
            </div>

            <div class="mt-6">
                <div class="article-detail-cover"
                    style="background: url({{ $article->assetImage() }}) center / cover no-repeat;">
                </div>
            </div>

            <div class="mt-4">
                <article>
                    {!! $article->translate_description !!}
                </article>
            </div>
        </div>
    </section>

    <div class="container my-10">
        <hr class="border-t border-[#BDBDBD]" />
    </div>

    <section id="articleDetailOthers">
        <div class="relative container">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ trans('index.related_article') }}
                </h2>
            </div>

            <div class="mt-10 flex justify-between items-center gap-4 lg:gap-6">
                <button type="button" class="articles-arrow articles-arrow-prev">
                    <i class="material-icons rounded-icon">chevron_left</i>
                </button>

                <div class="swiper swiper-articles">
                    <div class="swiper-wrapper">
                        @foreach ($relatedArticles as $relatedArticle)
                            <div class="swiper-slide article-item">
                                <div class="article-image-thumbnail"
                                    style="background: url({{ $relatedArticle->assetImage() }}) center / cover no-repeat;">
                                </div>

                                <div class="mt-3">
                                    <p class="article-latest-date">
                                        {{ $relatedArticle->date->isoFormat('LL') }}

                                    </p>
                                    <h2 class="article-latest-title">
                                        {{ $relatedArticle->translate_title }}

                                    </h2>
                                    <p class="article-latest-preview">
                                        {!! Str::limit(strip_tags($relatedArticle->translate_description), 200) !!}
                                        <a draggable="false"
                                            href="{{ route('article.view', ['slug' => $relatedArticle->slug]) }}"
                                            class="article-readmore">
                                            {{ trans('index.read_more') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button" class="articles-arrow articles-arrow-next">
                    <i class="material-icons rounded-icon">chevron_right</i>
                </button>
            </div>
        </div>
    </section>
</main>
