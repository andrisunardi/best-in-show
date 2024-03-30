@section('title', $event->translate_name)
@section('icon', 'fas fa-eye')

<main>
    <section id="activityDetailBreadcrumb">
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
                        <a draggable="false" href="{{ route('event.index') }}" wire:navigate>
                            {{ trans('index.event') }}
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

    <section id="activityeDetailContent">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <img draggable="false" class="w-full rounded-[20px]" src="{{ $event->assetImage() }}"
                    alt="{{ $event->altImage() }}" />

                <div>
                    <h1 class="text-primaryBlack text-2xl font-poppins-m">
                        {{ $event->translate_name }}
                    </h1>

                    <div class="my-4">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <p class="text-primaryBlack text-sm lg:text-base font-poppins-r">
                        {!! $event->translate_description !!}
                    </p>

                    <div class="my-4">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <div class="flex items-center gap-3">
                        <i class="material-icons rounded-icon text-primaryRed text-2xl">calendar_month</i>
                        <p class="text-primaryBlack text-sm lg:text-base font-poppins-sb">
                            {{ $event->date->isoFormat('LL') }}
                        </p>
                    </div>
                    <div class="mt-2 flex items-center gap-3">
                        <i class="material-icons rounded-icon text-primaryRed text-2xl">location_on</i>
                        <p class="text-primaryBlack text-sm lg:text-base font-poppins-sb">
                            {{ $event->location }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <div class="text-left">
                    <h2 class="page-heading-2 text-primaryBlack">
                        {{ trans('index.photo') }} {{ trans('index.event') }}
                    </h2>
                </div>
                <div class="mb-10 divider"></div>

                <div class="flex justify-between items-center gap-4 lg:gap-6">
                    <button type="button" class="articles-arrow articles-arrow-prev">
                        <i class="material-icons rounded-icon">chevron_left</i>
                    </button>
                    <div class="swiper swiper-activity">
                        <div class="swiper-wrapper">
                            @foreach ($event->images as $eventImage)
                                <div class="swiper-slide activity-item">
                                    <img draggable="false" src="{{ $eventImage->assetImage() }}"
                                        class="rounded-[20px]" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="articles-arrow articles-arrow-next">
                        <i class="material-icons rounded-icon">chevron_right</i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="articleVideo">
        <div class="relative mt-10 bg-[#730C03] h-80">
            <div class="container py-6">
                <div class="text-left">
                    <h2 class="page-heading-2 text-primaryWhite">
                        {{ trans('index.video') }} {{ trans('index.event') }}
                    </h2>
                </div>

                @foreach ($event->videos as $eventVideo)
                    <div class="mt-10">
                        <video class="rounded-[20px] w-full h-auto aspect-video" width="100%" height="100%" autoplay
                            muted-delete controls controlsList="nodownload">
                            <source src="{{ $eventVideo->assetVideo() }}" type="video/mp4">
                        </video>
                        {{-- <iframe src="https://www.youtube.com/embed/a3ICNMQW7Ok" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="rounded-[20px] w-full h-auto aspect-video"></iframe> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="md:h-32 lg:h-[500px]"></div>

    <section id="otherActivities">
        <div class="container mt-20">
            <div class="text-center">
                <h2 class="page-heading-2 text-primaryBlack">
                    {{ trans('index.related_event') }}
                </h2>
            </div>

            <div class="gridview-activities mt-6">
                @foreach ($relatedEvents as $relatedEvent)
                    <div class="activities-item">
                        <div class="cover-image" style="background-image: url({{ $relatedEvent->assetImage() }});">
                        </div>

                        <a draggable="false" href="{{ route('event.view', ['slug' => $relatedEvent->slug]) }}"
                            class="activity-title" wire:navigate>
                            {{ $event->translate_name }}
                        </a>

                        <div class="my-2">
                            <hr class="border-t border-[#E0E0E0]" />
                        </div>

                        <div class="activity-detail">
                            <i>date_range</i>
                            <p>{{ $relatedEvent->date->isoFormat('LL') }}</p>
                        </div>

                        <div class="mt-3 activity-detail">
                            <i>location_on</i>
                            <p>{{ $relatedEvent->location }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
