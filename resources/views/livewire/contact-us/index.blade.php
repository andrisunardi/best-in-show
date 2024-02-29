@section('title', trans('index.contact_us'))
@section('icon', 'fas fa-phone')

<main>
    <section id="contactBreadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <ol>
                    <li>
                        <a draggable="false" href="{{ route('index') }}">
                            {{ trans('index.home') }}
                        </a>
                        <span class="mx-2 font-poppins-m">&gt;</span>
                    </li>
                    <li>
                        <span class="current">
                            @yield('title')
                        </span>
                    </li>
                </ol>
            </div>
            <div class="my-6">
                <hr class="border-t-2 border-primaryGray" />
            </div>
        </div>
    </section>

    <section id="contactHeader">
        <div class="global-banner"
            style="
          background: linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.60) 0%,
            rgba(0, 0, 0, 0.60) 100%
          ),
          url({{ asset('assets/images/banner/contact-banner.webp') }})
          center / cover no-repeat fixed,
          #D9D9D9;
        ">
            <div class="placement">
                <h1>@yield('title')</h1>

                <div class="container mt-10">
                    <div class="contact-banner-detail">
                        <div class="contact-banner-flexview">
                            <div class="icon-wrapper">
                                <div class="absolute top-1/2 left-1/2 translate-50">
                                    <i>call</i>
                                </div>
                            </div>
                            <x-components::link.phone :value="env('CONTACT_PHONE')" :icon="''" />

                        </div>
                        <div class="contact-banner-flexview">
                            <div class="icon-wrapper">
                                <div class="absolute top-1/2 left-1/2 translate-50">
                                    <i>location_on</i>
                                </div>
                            </div>
                            <a draggable="false" href="{{ route('index') }}" target="_blank">
                                {!! env('CONTACT_ADDRESS') !!}
                            </a>
                        </div>
                        <div class="contact-banner-flexview">
                            <div class="icon-wrapper">
                                <div class="absolute top-1/2 left-1/2 translate-50">
                                    <i>mail</i>
                                </div>
                            </div>
                            <x-components::link.email :value="env('CONTACT_EMAIL')" :icon="''" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contactForm">
        <div class="container mt-10">
            <div class="text-left">
                <h2 class="page-heading-2 text-primaryBlack">
                    Informasi Kontak Anda
                </h2>
            </div>
            <div class="mb-10 divider"></div>

            <form id="contact-form" action="">
                <div class="contact-form-card">
                    <div class="gridview-contact">
                        <div class="form-group">
                            <label for="contact-fname">Nama Depan Anda <span class="asterisk"></span></label>
                            <input id="contact-fname" type="text" placeholder="Ketik Disini..." />
                        </div>

                        <div class="form-group">
                            <label for="contact-lname">Nama Belakang Anda <span class="asterisk"></span></label>
                            <input id="contact-lname" type="text" placeholder="Ketik Disini..." />
                        </div>

                        <div class="form-group">
                            <label for="contact-email">Email Anda <span class="asterisk"></span></label>
                            <input id="contact-email" type="email" placeholder="Ketik Disini..." />
                        </div>

                        <div class="form-group">
                            <label for="contact-email">No Handphone <span class="asterisk"></span></label>
                            <div class="flex flex-col md:flex-row items-center gap-2">
                                <div class="w-full md:w-1/5">
                                    <select>
                                        <option value="">+62</option>
                                    </select>
                                </div>
                                <div class="w-full md:w-4/5">
                                    <input id="contact-number" type="number" placeholder="08xx" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-address">Alamat Anda (optional)</label>
                            <input id="contact-address" type="text" placeholder="Ketik Disini..." />
                        </div>

                        <div class="form-group">
                            <label for="contact-city">Kota Anda (optional)</label>
                            <input id="contact-city" type="text" placeholder="Ketik Disini..." />
                        </div>

                        <div class="form-group">
                            <label for="contact-city">Provinsi (optional)</label>
                            <select id="contact-city">
                                <option value="">Banten</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact-postcode">Kode Pos (optional)</label>
                            <input id="contact-postcode" type="number" placeholder="Ketik Disini..." />
                        </div>
                    </div>
                </div>

                <div class="mt-6 contact-form-card">
                    <div class="gridview-contact">
                        <div class="form-group col-span-2">
                            <label for="contact-notes">Pesan Anda</label>
                            <textarea id="contact-notes" rows="6" placeholder="Ketik Disini..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="contact-file">Pilih File (optional)</label>
                            <input id="contact-file" type="file" />

                            <p class="mt-2 text-primaryGray text-sm font-poppins-r">
                                Max. 4.3MB tiap file. Format yang disarankan: xps, pdf, doc, docx, rtf,
                                txt, xls, clsx, csv, bmp, png, jpeg or jpg. Harap berikan lampiran untuk produk anda
                            </p>
                        </div>
                    </div>

                    <div class="my-10">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <div class="flex justify-center items-center gap-20">
                        <button type="button">
                            <img src="{{ asset('assets/images/icons/question.svg') }}" />
                        </button>
                        <button type="button">
                            <img src="{{ asset('assets/images/icons/thumbs-up.svg') }}" />
                        </button>
                        <button type="button">
                            <img src="{{ asset('assets/images/icons/thumbs-down.svg') }}" />
                        </button>
                    </div>
                </div>

                <div class="mt-10 lg:float-right">
                    <div class="flex max-lg:justify-between items-center gap-6">
                        <button type="button" class="btn-contact cancel">Batalkan</button>
                        <button type="button" class="btn-contact send">Kirim Pesan</button>
                    </div>
                </div>
                <div class="clear-both"></div>
            </form>
        </div>
    </section>
</main>
