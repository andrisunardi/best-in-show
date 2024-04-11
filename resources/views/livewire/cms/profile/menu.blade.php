<main>
    <div class="row g-3 mb-3">
        <div class="col-6 col-sm-auto">
            <x-components::link :text="trans('index.profile')" :class="'btn btn-primary w-100'" :href="route('cms.profile.index')" :icon="'fas fa-user-circle'" />
        </div>

        <div class="col-6 col-sm-auto">
            <x-components::link :text="trans('index.activity_log')" :class="'btn btn-info text-white w-100'" :href="route('cms.profile.activity-log')" :icon="'fas fa-user-clock'" />
        </div>

        <div class="col-sm-auto">
            <x-components::link :text="trans('index.edit_profile')" :class="'btn btn-success w-100'" :href="route('cms.profile.edit-profile')" :icon="'fas fa-user-edit'" />
        </div>

        <div class="col-sm-auto">
            <x-components::link :text="trans('index.change_password')" :class="'btn btn-warning text-white w-100'" :href="route('cms.profile.change-password')" :icon="'fas fa-user-lock'" />
        </div>

        <div class="col-sm-auto">
            <x-components::link :text="trans('index.logout')" :class="'btn btn-danger w-100'" :href="route('cms.logout')" :icon="'fas fa-sign-out-alt'" />
        </div>
    </div>
</main>
