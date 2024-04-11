@section('title', trans('index.edit') . ' - ' . trans('index.pet'))
@section('icon', 'fas fa-edit')

<div>
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <span class="fas fa-edit fa-fw"></span>
            {{ trans('index.edit') }} {{ trans('index.pet') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.pet.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.name :maxlength="100" :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.name :key="'name_idn'" :title="trans('validation.attributes.name_idn')" :maxlength="100"
                            :required="true" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.image />

                        <x-components::preview.image :image="$image" :data="$pet" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.image :key="'product_image'" :title="trans('validation.attributes.product_image')" />

                        <x-components::preview.image :image="$product_image" :data="$pet" />
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

        <div class="card-footer bg-success"></div>
    </div>
</div>
