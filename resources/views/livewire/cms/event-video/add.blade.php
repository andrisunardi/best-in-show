@section('title', trans('index.add') . ' - ' . trans('index.event_video'))
@section('icon', 'fas fa-plus')

<div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} {{ trans('index.event_video') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.event-video.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.select :key="'event_id'" :title="trans('validation.attributes.event_id')" :icon="'fas fa-calendar'"
                            :datas="$events" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.video />

                        <x-components::preview.video :video="$video" />
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
