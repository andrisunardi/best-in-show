@section('title', trans('index.clone') . ' - ' . trans('index.permission'))
@section('icon', 'fas fa-clone')

<div>
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <span class="fas fa-clone fa-fw"></span>
            {{ trans('index.clone') }} {{ trans('index.permission') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-button.back :href="route('cms.configuration.permission.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-form.alert />

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-form.name :icon="'fas fa-key'" :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-form.text :key="'guard_name'" :title="trans('validation.attributes.guard_name')" :icon="'fas fa-shield'" :required="true" />
                    </div>
                </div>

                <div class="row">
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
