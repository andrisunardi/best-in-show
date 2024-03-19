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
                            <a draggable="false" href="{{ env('CONTACT_GOOGLE_MAPS') }}" target="_blank">
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
                    {{ App::isLocale('en') ? 'Your Contact Information' : 'Informasi Kontak Anda' }}
                </h2>
            </div>
            <div class="mb-10 divider"></div>

            <form id="contact-form" wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="contact-form-card">
                    <div class="gridview-contact">
                        <div class="form-group">
                            <label for="first_name">
                                {{ App::isLocale('en') ? 'Your First Name' : 'Nama Depan Anda' }}
                                <span class="asterisk"></span>
                            </label>
                            <input wire:model="first_name" id="first_name" name="first_name" type="text"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}..." />
                        </div>

                        <div class="form-group">
                            <label for="last_name">
                                {{ App::isLocale('en') ? 'Your Last Name' : 'Nama Belakang Anda' }}
                                <span class="asterisk"></span>
                            </label>
                            <input wire:model="last_name" id="last_name" name="last_name" type="text"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}..." />
                        </div>

                        <div class="form-group">
                            <label for="email">
                                {{ App::isLocale('en') ? 'Your Email' : 'Email Anda' }}
                                <span class="asterisk"></span>
                            </label>
                            <input wire:model="email" id="email" name="email" type="email"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}..." />
                        </div>

                        <div class="form-group">
                            <label for="phone">
                                {{ App::isLocale('en') ? 'No Handphone' : 'No Handphone' }}
                                <span class="asterisk"></span>
                            </label>
                            <div class="flex flex-col md:flex-row items-center gap-2">
                                {{-- <div class="w-full md:w-1/5">
                                    <select wire:model="phone_country" id="phone_country" name="phone_country">
                                        <option value="+62" selected>+62</option>
                                    </select>
                                </div> --}}
                                <div class="w-full">
                                    <input wire:model="phone" id="phone" name="phone" type="number"
                                        placeholder="08xx" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">
                                {{ App::isLocale('en') ? 'Your address (optional)' : 'Alamat Anda (opsional)' }}
                            </label>
                            <input wire:model="address" id="address" name="address" type="text"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}..." />
                        </div>

                        <div class="form-group">
                            <label for="city">
                                {{ App::isLocale('en') ? 'Your city (optional)' : 'Kota Anda (opsional)' }}
                            </label>
                            <input wire:model="city" id="city" name="city" type="text"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}..." />
                        </div>

                        <div class="form-group">
                            <label for="province">
                                {{ App::isLocale('en') ? 'Province (optional)' : 'Provinsi (opsional)' }}
                            </label>
                            <input wire:model="province" id="province" name="province" type="text"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}..." />
                        </div>

                        <div class="form-group">
                            <label for="postal_code">
                                {{ App::isLocale('en') ? 'Postal Code (optional)' : 'Kode Pos (opsional)' }}
                            </label>
                            <input wire:model="postal_code" id="postal_code" name="postal_code" type="number"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}..." />
                        </div>
                    </div>
                </div>

                <div class="mt-6 contact-form-card">
                    <div class="gridview-contact">
                        <div class="form-group col-span-2">
                            <label for="message">
                                {{ App::isLocale('en') ? 'Your message' : 'Pesan Anda' }}
                                <span class="asterisk"></span>
                            </label>
                            <textarea wire:model="message" id="message" name="message" rows="6"
                                placeholder="{{ App::isLocale('en') ? 'Type Here' : 'Ketik Disini' }}...">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="attachment">
                                {{ App::isLocale('en') ? 'Select File (optional)' : 'Pilih Dokumen (opsional)' }}
                            </label>
                            <input wire:model="attachment" id="attachment" type="file" />
                            <p class="mt-2 text-primaryGray text-sm font-poppins-r">
                                {{ App::isLocale('en') ? 'Max. 4.3MB per file. Recommended formats: xps, pdf, doc, docx, rtf, txt, xls, clsx, csv, bmp, png, jpeg or jpg. Please provide attachments for your product' : 'Max. 4.3MB tiap file. Format yang disarankan: xps, pdf, doc, docx, rtf, txt, xls, clsx, csv, bmp, png, jpeg or jpg. Harap berikan lampiran untuk produk anda' }}
                            </p>
                        </div>
                    </div>

                    <div class="my-10">
                        <hr class="border-t border-[#BDBDBD]" />
                    </div>

                    <div class="flex justify-center items-center gap-20-delete gap-10">
                        <button type="button" wire:click="changeCategory(1)">
                            <span class="fa-stack fa-2x">
                                <i class="fa-solid fa-phone fa-stack-1x"
                                    @if ($category == 1) style="color: #B52519" @endif>
                                </i>
                                <i class="fa-regular fa-circle fa-stack-2x"
                                    @if ($category == 1) style="color: #B52519" @endif>
                                </i>
                            </span>
                            {{-- <img draggable="false" src="{{ asset('assets/images/icons/question.svg') }}" /> --}}
                        </button>
                        <button type="button" wire:click="changeCategory(2)">
                            <span class="fa-stack fa-2x">
                                <i class="fa-solid fa-thumbs-up fa-stack-1x"
                                    @if ($category == 2) style="color: #B52519" @endif>
                                </i>
                                <i class="fa-regular fa-circle fa-stack-2x"
                                    @if ($category == 2) style="color: #B52519" @endif>
                                </i>
                            </span>
                            {{-- <img draggable="false" src="{{ asset('assets/images/icons/thumbs-up.svg') }}" /> --}}
                        </button>
                        <button type="button" wire:click="changeCategory(3)">
                            <span class="fa-stack fa-2x">
                                <i class="fa-solid fa-thumbs-down fa-stack-1x"
                                    @if ($category == 3) style="color: #B52519" @endif>
                                </i>
                                <i class="fa-regular fa-circle fa-stack-2x"
                                    @if ($category == 3) style="color: #B52519" @endif>
                                </i>
                            </span>
                            {{-- <img draggable="false" src="{{ asset('assets/images/icons/thumbs-down.svg') }}" /> --}}
                        </button>
                    </div>
                </div>

                <div class="mt-10 lg:float-right">
                    <div class="flex max-lg:justify-between items-center gap-6">
                        <button type="reset" class="btn-contact cancel" wire:click="cancel">
                            {{ trans('index.cancel') }}
                        </button>
                        <button type="submit" class="btn-contact send">
                            {{ trans('index.send_message') }}
                        </button>
                    </div>
                </div>
                <div class="clear-both"></div>
            </form>
        </div>
    </section>
</main>
