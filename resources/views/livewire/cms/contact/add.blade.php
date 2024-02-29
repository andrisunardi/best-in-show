@section('title', trans('index.add') . ' - ' . trans('index.contact'))
@section('icon', 'fas fa-plus')

<div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} {{ trans('index.contact') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.contact.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.name :icon="'fas fa-user'" :maxlength="50" :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-components::form.text :key="'company'" :title="trans('validation.attributes.company')" :icon="'fas fa-building'" :maxlength="50" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.email :maxlength="50" :required="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-components::form.phone :maxlength="15" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <x-components::form.text :key="'subject'" :title="trans('validation.attributes.subject')" :icon="'fas fa-pencil'" :maxlength="100"
                            :required="true" />
                    </div>

                    <div class="col-sm-6 mb-3">
                        <x-components::form.textarea :key="'message'" :title="trans('validation.attributes.message')" :icon="'fas fa-message'" :required="true" />
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
