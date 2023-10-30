@section('title', trans('index.change_password') . ' - ' . trans('index.profile'))
@section('icon', 'fas fa-user-lock')

<main>
    @include('livewire.cms.profile.menu')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <span class="@yield('icon') fa-fw"></span>
                    @yield('title')
                </div>

                <div class="card-body">

                    <form wire:submit.prevent="submit" role="form" autocomplete="off">

                        <x-components::form.alert />

                        <div class="mb-3">
                            <x-components::form.password :key="'current_password'" :title="trans('validation.attributes.current_password')" :icon="'fas fa-lock'" :maxlength="50"
                                :required="true" :autocapitalize="'none'" :autofocus="true" />
                        </div>

                        <div class="mb-3">
                            <x-components::form.password :key="'new_password'" :title="trans('validation.attributes.new_password')" :icon="'fas fa-lock'" :maxlength="50"
                                :required="true" :autocapitalize="'none'" />
                        </div>

                        <div class="mb-3">
                            <x-components::form.password :key="'confirm_password'" :title="trans('validation.attributes.confirm_password')" :icon="'fas fa-lock'" :maxlength="50"
                                :required="true" :autocapitalize="'none'" />
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-auto">
                                <x-components::form.submit />
                            </div>
                            <div class="col-6 col-sm-auto">
                                <x-components::form.reset />
                            </div>
                        </div>

                    </form>

                </div>

                <div class="card-footer bg-warning"></div>
            </div>
        </div>
    </div>
</main>
