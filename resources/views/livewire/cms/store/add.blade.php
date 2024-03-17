@section('title', trans('index.add') . ' - ' . trans('index.store'))
@section('icon', 'fas fa-plus')

<div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} {{ trans('index.store') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.store.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.enum :key="'category'" :title="trans('validation.attributes.category')" :icon="'fas fa-list'" :datas="$storeCategories"
                            :required="true" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.name :icon="'fas fa-store'" :maxlength="100" :required="true"
                            :autofocus="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-components::form.address :maxlength="1000" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.textarea :key="'google_maps_iframe'" :title="trans('validation.attributes.google_maps_iframe')" :icon="'fas fa-code'"
                            :maxlength="300" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-components::form.textarea :key="'google_maps'" :title="trans('validation.attributes.google_maps')" :icon="'fas fa-map-marked-alt'"
                            :maxlength="100" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
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

        <div class="card-footer bg-primary"></div>
    </div>
</div>
