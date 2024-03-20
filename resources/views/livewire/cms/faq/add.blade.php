@section('title', trans('index.add') . ' - ' . trans('index.faq'))
@section('icon', 'fas fa-plus')

<div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} {{ trans('index.faq') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.faq.index')" />
                </div>
            </div>

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.text :key="'question'" :title="trans('validation.attributes.question')" :icon="'fas fa-question'" :maxlength="100"
                            :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.text :key="'question_idn'" :title="trans('validation.attributes.question_idn')" :icon="'fas fa-question'"
                            :maxlength="100" :required="true" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.textarea :key="'answer_idn'" :title="trans('validation.attributes.answer_idn')" :icon="'fas fa-comment'" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.textarea :key="'answer_idn'" :title="trans('validation.attributes.answer_idn')" :icon="'fas fa-comment'" />
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
