@section('title', trans('index.add') . ' - ' . trans('index.setting'))
@section('icon', 'fas fa-plus')

<main>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} {{ trans('index.setting') }}
        </div>

        <div class="card-body">
            <div class="row g-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.configuration.setting.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.name :key="'key'" :title="trans('validation.attributes.key')" :icon="'fas fa-key'" :maxlength="50"
                            :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.textarea :key="'value'" :title="trans('validation.attributes.value')" :required="true" />
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

        <div class="card-footer bg-primary"></div>
    </div>
</main>
