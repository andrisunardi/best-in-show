@section('title', trans('index.clone') . ' - ' . trans('index.setting'))
@section('icon', 'fas fa-clone')

<main>
    <div class="card mb-3">
        <div class="card-header bg-info-subtle">
            <span class="fas fa-clone fa-fw"></span>
            {{ trans('index.clone') }} {{ trans('index.setting') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.configuration.setting.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.name :key="'key'" :title="trans('validation.attributes.key')" :icon="'fas fa-key'" :maxlength="50"
                            :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-components::form.textarea :key="'value'" :title="trans('validation.attributes.value')" :required="true" />
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

        <div class="card-footer bg-info"></div>
    </div>
</main>
