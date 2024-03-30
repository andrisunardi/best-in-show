@section('title', trans('index.article'))
@section('icon', 'fas fa-newspaper')

<main>
    <section id="articlesBreadcrumb">
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
                        <span class="current">@yield('title')</span>
                    </li>
                </ol>
            </div>
            <div class="my-6">
                <hr class="border-t-2 border-primaryGray" />
            </div>
        </div>
    </section>

    <section id="articlesHeader">
        <div class="global-banner"
            style="
          background: linear-gradient(0deg, rgba(0, 0, 0, 0.60) 0%, rgba(0, 0, 0, 0.60) 100%),
          url({{ asset('assets/images/banner/article-banner.webp') }}) center / cover no-repeat fixed, #D9D9D9;
        ">
            <div class="placement">
                <h1>@yield('title')</h1>
            </div>
        </div>
    </section>

    @if ($latestArticle)
        <section id="articlesTrending">
            <div class="container mt-10">
                <div class="text-left">
                    <h2 class="page-heading-2 text-primaryBlack">
                        {{ App::isLocale('en') ? 'Trending News' : 'Berita Trending' }}
                    </h2>
                </div>
                <div class="mb-6 divider"></div>

                <div class="flex flex-col lg:flex-row gap-6">
                    <div class="lg:w-4/6 w-full">
                        <div class="article-image-thumbnail"
                            style="background: url({{ $latestArticle->assetImage() }}) center / cover no-repeat;">
                        </div>
                    </div>
                    <div class="lg:w-2/6 w-full">
                        <p class="article-trending-date">
                            {{ $latestArticle->date->isoFormat('LL') }}
                        </p>
                        <h2 class="article-trending-title">
                            {{ $latestArticle->translate_title }}
                        </h2>
                        <p class="article-trending-preview">
                            {!! Str::limit(strip_tags($latestArticle->translate_description), 200) !!}
                            <a draggable="false" href="{{ route('article.view', ['slug' => $latestArticle->slug]) }}"
                                class="article-readmore">
                                {{ trans('index.read_more') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section id="articlesLatest">
        <div class="container mt-10">
            <div class="text-left">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ trans('index.latest_article') }}
                </h2>
            </div>
            <div class="mb-6 divider"></div>
            <div class="gridview-article">
                @foreach ($articles as $article)
                    <div class="article-item">
                        <div class="article-image-thumbnail"
                            style="background: url({{ $article->assetImage() }}) center / cover no-repeat;">
                        </div>
                        <div class="mt-3">
                            <p class="article-latest-date">
                                {{ $article->date->isoFormat('LL') }}
                            </p>
                            <h2 class="article-latest-title">
                                {{ $article->translate_title }}
                            </h2>
                            <p class="article-latest-preview">
                                {!! Str::limit(strip_tags($article->translate_description), 200) !!}
                                <a draggable="false" href="{{ route('article.view', ['slug' => $article->slug]) }}"
                                    class="article-readmore" wire:navigate>
                                    {{ trans('index.read_more') }}
                                </a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
