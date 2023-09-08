@section('title', trans('index.login'))

<div>
    <main class="bg-body-secondary">
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100 mt-sm-5 mt-md-auto">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    <div class="mb-3 d-flex justify-content-center">
                        <img draggable="false" class="w-50" src="{{ asset('images/logo.png') }}"
                            alt="{{ trans('index.logo') }} - {{ env('APP_TITLE') }}">
                    </div>

                    <div class="card shadow rounded border-0 mb-sm-5 mb-md-auto">
                        <div class="card-header text-center">
                            <h5 class="card-title">{{ env('APP_NAME') }}</h5>
                            <p class="card-text">@yield('title')</p>
                        </div>

                        <div class="card-body">
                            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                                <x-form.alert />

                                <div class="mb-3">
                                    <x-form.username :maxlength="50" :required="true" :autocapitalize="'none'"
                                        :autofocus="true" />
                                </div>

                                <div class="mb-3">
                                    <x-form.password :maxlength="50" :required="true" :autocapitalize="'none'" />
                                </div>

                                <div class="mb-3">
                                    <x-form.boolean :key="'remember'" :title="trans('validation.attributes.remember')" :type="'checkbox'"
                                        :text="trans('index.stay_login')" :second="false" :required="false" :label="false" />
                                </div>

                                <div class="row align-items-center justify-content-between">
                                    <div class="col">
                                        <x-link :class="'small'" :text="trans('index.forgot_password')" :icon="''"
                                            :href="route('cms.forgot-password')" />
                                    </div>
                                    <div class="col">
                                        <x-form.submit :text="trans('index.login')" :icon="'fas fa-sign-in-alt'" />
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer text-center">
                            <small class="text-body-secondary">
                                &copy; {{ trans('index.copyright') }}
                                {{ env('APP_YEAR') && env('APP_YEAR') != now()->year ? env('APP_YEAR') . ' - ' : null }}
                                {{ now()->year }} &reg;
                                <a draggable="false" href="{{ route('index') }}" target="_blank" class="text-body">
                                    <strong>{{ env('APP_NAME') }}</strong>&trade;
                                </a>
                                <br />
                                {{ trans('index.all_rights_reserved') }}.
                            </small>
                            <br>
                            <small class="text-body-secondary">
                                {{ trans('index.created_and_designed_by') }}
                                <a draggable="false" href="https://www.diw.co.id" target="_blank">
                                    <img draggable="false" src="{{ asset('images/icon-diw.co.id.png') }}"
                                        alt="Icon DIW.co.id"
                                        title="{{ trans('index.created_and_designed_by') }} DIW.co.id">
                                </a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
