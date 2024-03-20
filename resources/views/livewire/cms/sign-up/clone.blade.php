@section('title', trans('index.clone') . ' - ' . trans('index.sign_up'))
@section('icon', 'fas fa-clone')

<div>
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <span class="fas fa-clone fa-fw"></span>
            {{ trans('index.clone') }} {{ trans('index.sign_up') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.sign-up.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.email :maxlength="50" :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.is-active />
                    </div>
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

        <div class="card-footer bg-info"></div>
    </div>
</div>
