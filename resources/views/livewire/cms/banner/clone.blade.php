@section('title', trans('index.clone') . ' - ' . trans('index.banner'))
@section('icon', 'fas fa-clone')

<div>
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <span class="fas fa-clone fa-fw"></span>
            {{ trans('index.clone') }} {{ trans('index.banner') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.banner.index')" />
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
                        <x-components::form.url :key="'link'" :title="trans('validation.attributes.link')" :maxlength="100" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.image />

                        <x-components::preview.image :image="$image" :data="$banner" />
                    </div>

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

        <div class="card-footer bg-info"></div>
    </div>
</div>
