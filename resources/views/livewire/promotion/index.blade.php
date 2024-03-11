@section('title', trans('index.promotion'))
@section('icon', 'fas fa-gifts')

<main>
    <section id="promotionBreadCrumb">
        <div class="container">
            <div class="breadcrumb">
                <ol>
                    <li>
                        <a draggable="false" href="{{ route('index') }}">{{ trans('index.home') }}</a>
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

    <section id="promotionHeader">
        <div class="global-banner"
            style="
          background: linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.60) 0%,
            rgba(0, 0, 0, 0.60) 100%
          ),
          url({{ asset('assets/images/banner/promotion-banner.webp') }})
          center / cover no-repeat fixed,
          #D9D9D9;
        ">
            <div class="placement">
                <h1>@yield('title')</h1>
            </div>
        </div>
    </section>

    <section id="promotionList">
        <div class="container mt-10">
            <div class="gridview-promotion">
                @foreach ($promotions as $promotion)
                    <div class="gridview-promotion-item">
                        <a draggable="false" href="{{ route('promotion.view', ['slug' => $promotion->slug]) }}">
                            <img draggable="false" src="{{ $promotion->assetImage() }}"
                                alt="{{ $promotion->translate_name }}" />
                            <div class="mt-3">
                                <p class="promo-date">{{ $promotion->date->isoFormat('LL') }}</p>
                                <p class="promo-title">{{ $promotion->translate_name }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
