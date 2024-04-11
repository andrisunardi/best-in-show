@section('title', trans('index.clone') . ' - ' . trans('index.store'))
@section('icon', 'fas fa-clone')

<div>
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <span class="fas fa-clone fa-fw"></span>
            {{ trans('index.clone') }} {{ trans('index.store') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.store.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.enum :key="'category'" :title="trans('validation.attributes.category')" :icon="'fas fa-list'" :datas="$storeCategories"
                            :required="true" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.name :icon="'fas fa-store'" :maxlength="100" :required="true"
                            :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.address :maxlength="1000" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.textarea :key="'google_maps_iframe'" :title="trans('validation.attributes.google_maps_iframe')" :icon="'fas fa-code'"
                            :maxlength="300" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.textarea :key="'google_maps'" :title="trans('validation.attributes.google_maps')" :icon="'fas fa-map-marked-alt'"
                            :maxlength="100" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
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
