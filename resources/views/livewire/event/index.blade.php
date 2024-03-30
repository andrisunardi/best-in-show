@section('title', trans('index.event'))
@section('icon', 'fas fa-calendar')

<main>
    <section id="activitiesBreadcrumb">
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

    <section id="activitiesHeader">
        <div class="global-banner"
            style="
          background: linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.60) 0%,
            rgba(0, 0, 0, 0.60) 100%
          ),
          url({{ asset('assets/images/banner/activities-banner.webp') }})
          center / cover no-repeat fixed,
          #D9D9D9;
        ">
            <div class="placement">
                <h1>Kegiatan Kami</h1>
            </div>
        </div>
    </section>

    <section id="activitiesList">
        <div class="container mt-10">
            <div class="gridview-activities">
                @foreach ($events as $event)
                    <div class="activities-item">
                        <div class="cover-image" style="background-image: url({{ $event->assetImage() }});"></div>

                        <a draggable="false" href="{{ route('event.view', ['slug' => $event->slug]) }}"
                            class="activity-title" wire:navigate>
                            {{ $event->translate_name }}
                        </a>

                        <div class="my-2">
                            <hr class="border-t border-[#E0E0E0]" />
                        </div>

                        <div class="activity-detail">
                            <i>date_range</i>
                            <p>{{ $event->date->isoFormat('LL') }}</p>
                        </div>

                        <div class="mt-3 activity-detail">
                            <i>location_on</i>
                            <p>{{ $event->location }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
