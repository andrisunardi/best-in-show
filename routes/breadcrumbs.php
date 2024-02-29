<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.error'), null, ['icon' => 'fas fa-circle-exclamation']);
});

Breadcrumbs::for('livewire.message', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.message'), null, ['icon' => 'fas fa-message']);
});

Breadcrumbs::for('livewire.update', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.update'), null, ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('livewire.preview-file', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.preview_file'), null, ['icon' => 'fas fa-photo-film']);
});

Breadcrumbs::for('telescope', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.telescope'), null, ['icon' => 'fas fa-telescope']);
});

Breadcrumbs::for('horizon.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.horizon'), null, ['icon' => 'fas fa-cloud-moon']);
});

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('index.home'), route('index'), ['icon' => 'fas fa-home']);
});

// CMS
Breadcrumbs::for('cms.index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('index.home'), route('cms.index'), ['icon' => 'fas fa-home']);
});

// CONTACT
Breadcrumbs::for('cms.contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.contact'), route('cms.contact.index'), ['icon' => 'fas fa-phone']);
});

Breadcrumbs::for('cms.contact.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.add'), route('cms.contact.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.contact.clone', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.clone'), route('cms.contact.clone', ['contact' => $contact]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.contact.edit', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.edit'), route('cms.contact.edit', ['contact' => $contact]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.contact.view', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.view'), route('cms.contact.view', ['contact' => $contact]), ['icon' => 'fas fa-eye']);
});

Breadcrumbs::for('cms.contact.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.trash'), route('cms.contact.trash'), ['icon' => 'fas fa-dumpster']);
});

// CONFIGURATION
Breadcrumbs::for('cms.configuration.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.configuration'), route('cms.configuration.index'), ['icon' => 'fas fa-cogs']);
});

// ACTIVITY
Breadcrumbs::for('cms.configuration.activity', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.activity'), route('cms.configuration.activity'), ['icon' => 'fas fa-clock-rotate-left']);
});

// USER
Breadcrumbs::for('cms.configuration.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.user'), route('cms.configuration.user.index'), ['icon' => 'fas fa-user']);
});

Breadcrumbs::for('cms.configuration.user.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.add'), route('cms.configuration.user.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.user.clone', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.clone'), route('cms.configuration.user.clone', ['user' => $user]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.user.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.edit'), route('cms.configuration.user.edit', ['user' => $user]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.user.view', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.view'), route('cms.configuration.user.view', ['user' => $user]), ['icon' => 'fas fa-eye']);
});

Breadcrumbs::for('cms.configuration.user.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.trash'), route('cms.configuration.user.trash'), ['icon' => 'fas fa-dumpster']);
});

// ROLE
Breadcrumbs::for('cms.configuration.role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.role'), route('cms.configuration.role.index'), ['icon' => 'fas fa-suitcase']);
});

Breadcrumbs::for('cms.configuration.role.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.add'), route('cms.configuration.role.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.role.clone', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.clone'), route('cms.configuration.role.clone', ['role' => $role]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.role.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.edit'), route('cms.configuration.role.edit', ['role' => $role]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.role.view', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.view'), route('cms.configuration.role.view', ['role' => $role]), ['icon' => 'fas fa-eye']);
});

// PERMISSION
Breadcrumbs::for('cms.configuration.permission.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.permission'), route('cms.configuration.permission.index'), ['icon' => 'fas fa-key']);
});

Breadcrumbs::for('cms.configuration.permission.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.add'), route('cms.configuration.permission.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.permission.clone', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.clone'), route('cms.configuration.permission.clone', ['permission' => $permission]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.permission.edit', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.edit'), route('cms.configuration.permission.edit', ['permission' => $permission]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.permission.view', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.view'), route('cms.configuration.permission.view', ['permission' => $permission]), ['icon' => 'fas fa-eye']);
});

// SETTING
Breadcrumbs::for('cms.configuration.setting.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.setting'), route('cms.configuration.setting.index'), ['icon' => 'fas fa-gear']);
});

Breadcrumbs::for('cms.configuration.setting.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.add'), route('cms.configuration.setting.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.setting.clone', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.clone'), route('cms.configuration.setting.clone', ['setting' => $setting]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.setting.edit', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.edit'), route('cms.configuration.setting.edit', ['setting' => $setting]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.setting.view', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.view'), route('cms.configuration.setting.view', ['setting' => $setting]), ['icon' => 'fas fa-eye']);
});

Breadcrumbs::for('cms.configuration.setting.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.trash'), route('cms.configuration.setting.trash'), ['icon' => 'fas fa-dumpster']);
});

// PROFILE
Breadcrumbs::for('cms.profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.profile'), route('cms.profile.index'), ['icon' => 'fas fa-user-circle']);
});

Breadcrumbs::for('cms.profile.activity-log', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.profile.index');
    $trail->push(trans('index.activity_log'), route('cms.profile.activity-log'), ['icon' => 'fas fa-user-clock']);
});

Breadcrumbs::for('cms.profile.edit-profile', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.profile.index');
    $trail->push(trans('index.edit_profile'), route('cms.profile.edit-profile'), ['icon' => 'fas fa-user-edit']);
});

Breadcrumbs::for('cms.profile.change-password', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.profile.index');
    $trail->push(trans('index.change_password'), route('cms.profile.change-password'), ['icon' => 'fas fa-user-lock']);
});
