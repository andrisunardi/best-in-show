@section('title', trans('index.about_us'))
@section('icon', 'fas fa-building')

<main>
    <section id="aboutHeader">
        <div class="global-banner"
            style="
          background: linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.60) 0%,
            rgba(0, 0, 0, 0.60) 100%
          ),
          url({{ asset('assets/images/banner/about-banner.webp') }})
          center / cover no-repeat fixed,
          #D9D9D9;
        ">
            <div class="placement">
                <h1>@yield('title')</h1>
            </div>
        </div>
    </section>

    <section id="aboutTabButton">
        <div class="container mt-12">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <button id="btn-aboutVisionMission" type="button" class="btn-about-tab active"
                    onclick="switchSection('aboutVisionMission')">
                    {{ trans('index.about_us') }}
                </button>
                <button id="btn-aboutPinter" type="button" class="btn-about-tab"
                    onclick="switchSection('aboutPinter')">
                    {{ App::isLocale('en') ? 'Smart' : 'Pinter' }}
                </button>
                <button id="btn-aboutDistribution" type="button" class="btn-about-tab"
                    onclick="switchSection('aboutDistribution')">
                    {{ App::isLocale('en') ? 'Distribution Aera' : 'Area Distribusi' }}
                </button>
                <button id="btn-aboutWarehouse" type="button" class="btn-about-tab"
                    onclick="switchSection('aboutWarehouse')">
                    {{ App::isLocale('en') ? 'Our Warehouse' : 'Gudang Kami' }}
                </button>
            </div>
        </div>
    </section>

    <section id="aboutVisionMission" class="about-section">
        <div class="container">
            <!-- <div class="text-left">
          <h2 class="page-heading-2 text-primaryBlack">Visi &amp; Misi</h2>
        </div> -->
            <div class="mt-6">
                <img draggable="false" src="{{ asset('assets/images/thumbnail/bisfood-visi-misi.webp') }}"
                    class="about-items" alt="Visi & Misi Best In Show">
            </div>
        </div>
    </section>

    <section id="aboutPinter" class="about-section" style="display: none;">
        <div class="container">
            <!-- <div class="text-left">
          <h2 class="page-heading-2 text-primaryBlack">Lorem Ipsum</h2>
        </div> -->
            <div class="mt-6">
                <img src="{{ asset('assets/images/thumbnail/bisfood-pinter.webp') }}" class="about-items"
                    alt="PINTER">
            </div>
        </div>
    </section>

    <section id="aboutDistribution" class="about-section" style="display: none;">
        <div class="container">
            <!-- <div class="text-left">
          <h2 class="page-heading-2 text-primaryBlack">Area Distribusi</h2>
        </div> -->
            <div class="mt-6">
                <img src="{{ asset('assets/images/thumbnail/bisfood-distribusi.webp') }}" class="about-items"
                    alt="Area Distribusi">
            </div>
        </div>
    </section>

    <section id="aboutWarehouse" class="about-section" style="display: none;">
        <div class="container">
            <!-- <div class="text-left">
          <h2 class="page-heading-2 text-primaryBlack">Gudang Kami</h2>
        </div> -->
            <div class="mt-6">
                <img src="{{ asset('assets/images/thumbnail/bisfood-warehouse.webp') }}" class="about-items"
                    alt="Gudang Kami">
            </div>
        </div>
    </section>
</main>
