@section('title', trans('index.edit') . ' - ' . trans('index.setting'))
@section('icon', 'fas fa-edit')

<div>
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <span class="fas fa-edit fa-fw"></span>
            {{ trans('index.edit') }} {{ trans('index.setting') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-button.back :href="route('cms.configuration.setting.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-form.alert />

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-text :key="'key'" :title="trans('validation.attributes.key')" :icon="'fas fa-key'" :maxlength="50"
                            :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-textarea :key="'value'" :title="trans('validation.attributes.value')" :required="true" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-form.is-active />
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
