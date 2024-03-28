<?php

return [
    [
        'roles' => 'Super User|Admin|Contact',
        'permissions' => 'Contact',
        'name' => 'Contact',
        'route' => 'cms.contact.index',
        'icon' => 'fas fa-phone',
        'table' => 'contacts',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Sign Up',
        'permissions' => 'Sign Up',
        'name' => 'Sign Up',
        'route' => 'cms.sign-up.index',
        'icon' => 'fas fa-pencil',
        'table' => 'sign_ups',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Article',
        'permissions' => 'Article',
        'name' => 'Article',
        'route' => 'cms.article.index',
        'icon' => 'fas fa-newspaper',
        'table' => 'articles',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Event',
        'permissions' => 'Event',
        'name' => 'Event',
        'route' => 'cms.event.index',
        'icon' => 'fas fa-calendar',
        'table' => 'events',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Event Image',
        'permissions' => 'Event Image',
        'name' => 'Event Image',
        'route' => 'cms.event-image.index',
        'icon' => 'fas fa-image',
        'table' => 'event_images',
        'sidebar' => true,
        'subMenus' => [],
    ],
    // [
    //     'roles' => 'Super User|Admin|Event Video',
    //     'permissions' => 'Event Video',
    //     'name' => 'Event Video',
    //     'route' => 'cms.event.index',
    //     'icon' => 'fas fa-video',
    //     'table' => 'event_videos',
    //     'sidebar' => true,
    //     'subMenus' => [],
    // ],
    [
        'roles' => 'Super User|Admin|Promotion',
        'permissions' => 'Promotion',
        'name' => 'Promotion',
        'route' => 'cms.promotion.index',
        'icon' => 'fas fa-gift',
        'table' => 'promotions',
        'sidebar' => true,
        'subMenus' => [],
    ],
    // [
    //     'roles' => 'Super User|Admin|Product',
    //     'permissions' => 'Product',
    //     'name' => 'Product',
    //     'route' => 'cms.product.index',
    //     'icon' => 'fas fa-box',
    //     'table' => 'products',
    //     'sidebar' => true,
    //     'subMenus' => [],
    // ],
    // [
    //     'roles' => 'Super User|Admin|Product Category',
    //     'permissions' => 'Product Category',
    //     'name' => 'Product Category',
    //     'route' => 'cms.product-category.index',
    //     'icon' => 'fas fa-tag',
    //     'table' => 'product_categories',
    //     'sidebar' => true,
    //     'subMenus' => [],
    // ],
    [
        'roles' => 'Super User|Admin|Product Type',
        'permissions' => 'Product Type',
        'name' => 'Product Type',
        'route' => 'cms.product-type.index',
        'icon' => 'fas fa-tags',
        'table' => 'product_types',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Banner',
        'permissions' => 'Banner',
        'name' => 'Banner',
        'route' => 'cms.banner.index',
        'icon' => 'fas fa-images',
        'table' => 'banners',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Slider',
        'permissions' => 'Slider',
        'name' => 'Slider',
        'route' => 'cms.slider.index',
        'icon' => 'fas fa-sliders',
        'table' => 'sliders',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Store',
        'permissions' => 'Store',
        'name' => 'Store',
        'route' => 'cms.store.index',
        'icon' => 'fas fa-store',
        'table' => 'stores',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Faq',
        'permissions' => 'Faq',
        'name' => 'Faq',
        'route' => 'cms.faq.index',
        'icon' => 'fas fa-question',
        'table' => 'faqs',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User|Admin|Pet',
        'permissions' => 'Pet',
        'name' => 'Pet',
        'route' => 'cms.pet.index',
        'icon' => 'fas fa-dog',
        'table' => 'pets',
        'sidebar' => true,
        'subMenus' => [],
    ],
    [
        'roles' => 'Super User',
        'permissions' => 'Configuration',
        'name' => 'Configuration',
        'route' => 'cms.configuration.index',
        'icon' => 'fas fa-gears',
        'table' => null,
        'sidebar' => true,
        'subMenus' => [
            [
                'roles' => 'Super User',
                'permissions' => 'Configuration',
                'name' => 'Configuration',
                'route' => 'cms.configuration.index',
                'icon' => 'fas fa-gears',
                'table' => null,
                'sidebar' => false,
            ],
            [
                'roles' => 'Super User',
                'permissions' => 'Activity',
                'name' => 'Activity',
                'route' => 'cms.configuration.activity',
                'icon' => 'fas fa-history',
                'table' => 'activity_log',
                'sidebar' => true,
            ],
            [
                'roles' => 'Super User',
                'permissions' => 'User',
                'name' => 'User',
                'route' => 'cms.configuration.user.index',
                'icon' => 'fas fa-user',
                'table' => 'users',
                'sidebar' => true,
            ],
            [
                'roles' => 'Super User',
                'permissions' => 'Role',
                'name' => 'Role',
                'route' => 'cms.configuration.role.index',
                'icon' => 'fas fa-briefcase',
                'table' => 'roles',
                'sidebar' => true,
            ],
            [
                'roles' => 'Super User',
                'permissions' => 'Permission',
                'name' => 'Permission',
                'route' => 'cms.configuration.permission.index',
                'icon' => 'fas fa-key',
                'table' => 'permissions',
                'sidebar' => true,
            ],
            [
                'roles' => 'Super User',
                'permissions' => 'Setting',
                'name' => 'Setting',
                'route' => 'cms.configuration.setting.index',
                'icon' => 'fas fa-gear',
                'table' => 'settings',
                'sidebar' => true,
            ],
        ],
    ],
];
