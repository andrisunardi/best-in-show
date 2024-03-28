@section('title', trans('index.add') . ' - ' . trans('index.product_category'))
@section('icon', 'fas fa-plus')

<div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} {{ trans('index.product_category') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.product-category.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.select :key="'pet_id'" :title="trans('validation.attributes.pet_id')" :icon="'fas fa-dog'"
                            :datas="$pets" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.select :key="'product_type_id'" :title="trans('validation.attributes.product_type_id')" :icon="'fas fa-tags'"
                            :datas="$productTypes" :required="true" />
                    </div>
                </div>

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

                        <x-components::preview.image :image="$image" />
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
</div>
