@section('title', trans('index.edit_profile') . ' - ' . trans('index.profile'))
@section('icon', 'fas fa-user-edit')

<div>
    @include('livewire.cms.profile.menu')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <span class="@yield('icon') fa-fw"></span>
                    @yield('title')
                </div>

                <div class="card-body">

                    <form wire:submit.prevent="submit" role="form" autocomplete="off">

                        <x-form.alert />

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <x-form.name :icon="'fas fa-id-card'" :maxlength="50" :required="true" :autofocus="true" />
                            </div>

                            <div class="col-sm-6 mb-3">
                                <x-form.username :maxlength="50" :required="true" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <x-form.email :maxlength="50" :required="true" :autocapitalize="'none'" />
                            </div>

                            <div class="col-sm-6 mb-3">
                                <x-form.phone :maxlength="15" :required="true" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <x-form.image />

                                <x-preview.image :image="$image" :data="Auth::user()" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-auto">
                                <x-form.submit />
                            </div>
                            <div class="col-6 col-sm-auto">
                                <x-form.reset />
                            </div>
                        </div>

                    </form>

                </div>

                <div class="card-footer bg-success"></div>
            </div>
        </div>
    </div>
</div>
