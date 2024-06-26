@section('title', trans('index.clone') . ' - ' . trans('index.user'))
@section('icon', 'fas fa-clone')

<main>
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <span class="fas fa-clone fa-fw"></span>
            {{ trans('index.clone') }} {{ trans('index.user') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.configuration.user.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.name :icon="'fas fa-id-card'" :maxlength="50" :required="true"
                            :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.username :maxlength="50" :required="true" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.email :maxlength="50" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.phone :maxlength="15" :required="true" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.password :maxlength="50" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.image />

                        <x-components::preview.image :image="$image" :data="$user" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.is-active />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.checkbox :key="'role_ids'" :title="trans('validation.attributes.role_ids')" :datas="$roles" />
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
</main>
