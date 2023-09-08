# Portfolio

Name : Laravel Template<br>
Category : Template<br>
Date : October 27, 2015<br>
Client : DIW.co.id<br>
Domain : [laravel-template.diw.co.id](https://www.laravel-template.diw.co.id)

## Framework

<ol>
    <li>Framework : Laravel</li>
    <li>Database : MySql</li>
</ol>

## Created By :

<ol>
    <li>Andri Sunardi</li>
</ol>

## Structure

```
laravel-template
```

## Route

WEB

<ol>
<li>[Any] - Home | /</li>
</ol>

CMS

<ol>
<li>[Any] - Login | /login</li>
<li>[Any] - Forgot Password | /forgot-password</li>
<li>[Any] - Home | /</li>
<li>[Any] - Configuration | /configuration</li>
<li>[Any] - Activity | /configuration/activity</li>
<li>[Any] - User | /configuration/user</li>
<li>[Any] - Role | /configuration/role</li>
<li>[Any] - Permission | /configuration/permission</li>
<li>[Any] - Setting | /configuration/setting</li>
<li>[Any] - Profile | /profile</li>
<li>[Any] - Activity Log | /profile/activity-log</li>
<li>[Any] - Edit Profile | /profile/edit-profile</li>
<li>[Any] - Change Password | /profile/change-password</li>
<li>[Any] - Logout | /logout</li>
</ol>

## Installation

```
composer install
```

```
php artisan migrate:fresh --seed
```

```
php artisan serve
```

## Package

<ol>
    <li>Livewire</li>
    <li>Livewire Alert</li>
    <li>Envoy</li>
    <li>Telescope</li>
    <li>Horizon</li>
    <li>Paratest</li>
    <li>Laravel Activity Log</li>
    <li>Laravel Permission</li>
    <li>Laravel Menu</li>
    <li>Laravel Breadcrumbs</li>
    <li>Laravel IDE Helper</li>
    <li>Laravel Debugbar</li>
    <li>Pretty Routes</li>
    <li>Mobile Detect</li>
    <li>Laravel Mobile Detect</li>
    <li>Livewire Charts</li>
    <li>Simple QR Code</li>
    <li>Laravel ZIP</li>
</ol>

### Livewire

```
composer require livewire/livewire
```

[Packagist](https://packagist.org/packages/livewire/livewire)
[Github](https://github.com/livewire/livewire)
[Website](https://laravel-livewire.com)

### Livewire Alert

```
composer require jantinnerezo/livewire-alert
```

```
php artisan vendor:publish --tag=livewire-alert:assets
```

[Packagist](https://packagist.org/packages/jantinnerezo/livewire-alert)
[Github](https://github.com/jantinnerezo/livewire-alert)
[Website](https://livewire-alert.jantinnerezo.com)

### Envoy

```
composer require laravel/envoy
```

[Packagist](https://packagist.org/packages/laravel/envoy)
[Github](https://github.com/laravel/envoy)
[Website](https://laravel.com/docs/envoy)

### Telescope

```
composer require laravel/telescope
```

[Packagist](https://packagist.org/packages/laravel/telescope)
[Github](https://github.com/laravel/telescope)
[Website](https://laravel.com/docs/telescope)

### Horizon

```
composer require laravel/horizon
```

[Packagist](https://packagist.org/packages/laravel/horizon)
[Github](https://github.com/laravel/horizon)
[Website](https://laravel.com/docs/horizon)

### Paratest

```
composer require brianium/paratest
```

[Packagist](https://packagist.org/packages/brianium/paratest)
[Github](https://github.com/paratestphp/paratest)

### Laravel Activity Log

```
composer require spatie/laravel-activitylog
```

[Packagist](https://packagist.org/packages/spatie/laravel-activitylog)
[Github](https://github.com/spatie/laravel-activitylog)
[Website](https://spatie.be/docs/laravel-activitylog)

### Laravel Permission

```
composer require spatie/laravel-permission
```

[Packagist](https://packagist.org/packages/spatie/laravel-permission)
[Github](https://github.com/spatie/laravel-permission)
[Website](https://spatie.be/docs/laravel-permission)

### Laravel Menu

```
composer require spatie/menu
```

```
composer require spatie/laravel-menu
```

[Packagist](https://packagist.org/packages/spatie/laravel-menu)
[Github](https://github.com/spatie/menu)
[Website](https://spatie.be/docs/menu)
[Website](https://freek.dev/414-a-modern-package-to-generate-html-menus)

### Laravel Breadcrumbs

```
composer require diglactic/laravel-breadcrumbs
```

[Packagist](https://packagist.org/packages/diglactic/laravel-breadcrumbs)
[Github](https://github.com/diglactic/laravel-breadcrumbs)

### Laravel IDE Helper

```
composer require barryvdh/laravel-ide-helper
```

```
composer.json
"extra": {
  "laravel": {
    "dont-discover": [
      "barryvdh/laravel-ide-helper"
    ]
  }
}
"scripts": {
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "@php artisan ide-helper:generate",
        "@php artisan ide-helper:meta"
    ]
},
```

```
config/app.php
Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
```

```
public function register()
{
    if (app()->isLocal()) {
        app()->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
    // ...
}
```

[Packagist](https://packagist.org/packages/barryvdh/laravel-ide-helper)
[Github](https://github.com/barryvdh/laravel-ide-helper)

### Laravel Debugbar

```
composer require barryvdh/laravel-debugbar
```

[Packagist](https://packagist.org/packages/barryvdh/laravel-debugbar)
[Github](https://github.com/barryvdh/laravel-debugbar)

### Pretty Routes

```
composer require garygreen/pretty-routes
```

```
config/app.php
PrettyRoutes\ServiceProvider::class,
```

```
php artisan vendor:publish --provider="PrettyRoutes\ServiceProvider"
```

```
Access
/routes
```

[Packagist](https://packagist.org/packages/garygreen/pretty-routes)
[Github](https://github.com/garygreen/pretty-routes)

### Mobile Detect

```
composer require mobiledetect/mobiledetectlib
```

[Packagist](https://packagist.org/packages/mobiledetect/mobiledetectlib)
[Github](https://github.com/serbanghita/Mobile-Detect)
[Website](http://mobiledetect.net)

### Laravel Mobile Detect (CONFLIC NOT USED ANYMORE)

```
composer require riverskies/laravel-mobile-detect
```

[Packagist](https://packagist.org/packages/riverskies/laravel-mobile-detect)
[Github](https://github.com/riverskies/laravel-mobile-detect)

### Livewire Charts

```
composer require asantibanez/livewire-charts

php artisan livewire-charts:install
```

````
**layouts/app.blade.php**

@livewireChartsScripts

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
```

[Packagist](https://packagist.org/packages/asantibanez/livewire-charts)
[Github](https://github.com/asantibanez/livewire-charts)

### Simple QR Code

```
composer require simplesoftwareio/simple-qrcode
```

```
**config/app.php**

SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,
'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
```

```
{!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
```

[Packagist](https://packagist.org/packages/riverskies/laravel-mobile-detect)
[Github](https://github.com/riverskies/laravel-mobile-detect)
[Website](https://techvblogs.com/blog/generate-qr-code-laravel-8)

### Laravel ZIP

```
composer require zanysoft/laravel-zip
```

```
**config/app.php**

ZanySoft\Zip\ZipServiceProvider::class,
'Zip' => ZanySoft\Zip\Facades\Zip::class,
```

[Packagist](https://packagist.org/packages/zanysoft/laravel-zip)
[Github](https://github.com/zanysoft/laravel-zip)
[Website](https://zanysoft.net)
````

# Copyright 2015 ® DIW.co.id™ . All Rights Reserved.
