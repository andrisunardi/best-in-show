@section('title', trans('index.edit') . ' - ' . trans('index.product'))
@section('icon', 'fas fa-edit')

<div>
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <span class="fas fa-edit fa-fw"></span>
            {{ trans('index.edit') }} {{ trans('index.product') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.product.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-4">
                        <x-components::form.select :key="'pet_id'" :title="trans('validation.attributes.pet_id')" :icon="'fas fa-dog'"
                            :datas="$pets" :required="true" />
                    </div>

                    <div class="col-sm-4">
                        <x-components::form.select :key="'product_type_id'" :title="trans('validation.attributes.product_type_id')" :icon="'fas fa-tags'"
                            :datas="$productTypes" :required="true" />
                    </div>

                    <div class="col-sm-4">
                        <x-components::form.select :key="'product_category_id'" :title="trans('validation.attributes.product_category_id')" :icon="'fas fa-tag'"
                            :datas="$productCategories" :required="true" />
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
                        <x-components::form.description />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.description :key="'description_idn'" :title="trans('validation.attributes.description_idn')" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.text :key="'variant'" :title="trans('validation.attributes.variant')" :icon="'fas fa-boxes'"
                            :maxlength="100" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.text :key="'variant_idn'" :title="trans('validation.attributes.variant_idn')" :icon="'fas fa-boxes'"
                            :maxlength="100" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-4">
                        <x-components::form.text :key="'size'" :title="trans('validation.attributes.size')" :icon="'fas fa-balance-scale'"
                            :maxlength="100" />
                    </div>

                    <div class="col-sm-4">
                        <x-components::form.text :key="'weight'" :title="trans('validation.attributes.weight')" :icon="'fas fa-weight'"
                            :maxlength="100" />
                    </div>

                    <div class="col-sm-4">
                        <x-components::form.text :key="'color'" :title="trans('validation.attributes.color')" :icon="'fas fa-palette'"
                            :maxlength="100" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.url :key="'blibli'" :title="trans('validation.attributes.blibli')" :maxlength="100" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.url :key="'lazada'" :title="trans('validation.attributes.lazada')" :maxlength="100" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.url :key="'shopee'" :title="trans('validation.attributes.shopee')" :maxlength="100" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.url :key="'tokopedia'" :title="trans('validation.attributes.tokopedia')" :maxlength="100" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.image />

                        <x-components::preview.image :image="$image" :data="$product" />
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
