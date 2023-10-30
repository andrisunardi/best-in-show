@section('title', trans('index.edit') . ' - ' . trans('index.role'))
@section('icon', 'fas fa-edit')

<main>
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <span class="fas fa-edit fa-fw"></span>
            {{ trans('index.edit') }} {{ trans('index.role') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.configuration.role.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.name :icon="'fas fa-briefcase'" :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-components::form.text :key="'guard_name'" :title="trans('validation.attributes.guard_name')" :icon="'fas fa-shield'" :required="true" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.checkbox :key="'permission_ids'" :title="trans('validation.attributes.permission_ids')" :datas="$permissions" />
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

        <div class="card-footer bg-success"></div>
    </div>
</main>
