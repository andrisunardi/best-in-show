@section('title', trans('index.clone') . ' - ' . trans('index.user'))
@section('icon', 'fas fa-clone')

<div>
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <span class="fas fa-clone fa-fw"></span>
            {{ trans('index.clone') }} {{ trans('index.user') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-button.back :href="route('cms.configuration.user.index')" />
                </div>
            </div>

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
                        <x-form.email :maxlength="50" :required="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-form.phone :maxlength="15" :required="true" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-form.password :maxlength="50" :required="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-form.image />

                        <x-preview.image :image="$image" :data="$user" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-form.is-active />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-form.checkbox :key="'role_ids'" :title="trans('validation.attributes.role_ids')" :datas="$roles" />
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

        <div class="card-footer bg-info"></div>
    </div>
</div>
