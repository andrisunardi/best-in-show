@section('title', trans('index.add') . ' - ' . trans('index.slider'))
@section('icon', 'fas fa-plus')

<div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} {{ trans('index.slider') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.slider.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.image />

                        <x-components::preview.image :image="$image" />
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

        <div class="card-footer bg-primary"></div>
    </div>
</div>
