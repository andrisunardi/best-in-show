<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\HomePage;
use App\Models\Setting;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_language(): void
    {
        Livewire::actingAs($this->auth)
            ->test(HomePage::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.');
    }

    public function test_redirect(): void
    {
        Livewire::actingAs($this->auth)
            ->test(HomePage::class)
            ->assertNoRedirect();
    }

    public function test_view_is(): void
    {
        Livewire::actingAs($this->auth)
            ->test(HomePage::class)
            ->assertViewIs('livewire.cms.home.index');
    }

    public function test_status(): void
    {
        Livewire::actingAs($this->auth)
            ->test(HomePage::class)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_see_data(): void
    {
        Livewire::actingAs($this->auth)
            ->test(HomePage::class)
            ->assertSee('Activity')
            ->assertSee(Activity::count())
            ->assertSee(env('APP_CMS_URL').'/configuration/activity')
            ->assertSee('User')
            ->assertSee(User::count())
            ->assertSee(env('APP_CMS_URL').'/configuration/user')
            ->assertSee('Role')
            ->assertSee(Role::count())
            ->assertSee(env('APP_CMS_URL').'/configuration/role')
            ->assertSee('Permission')
            ->assertSee(Permission::count())
            ->assertSee(env('APP_CMS_URL').'/configuration/permission')
            ->assertSee('Setting')
            ->assertSee(Setting::count())
            ->assertSee(env('APP_CMS_URL').'/configuration/setting');
    }
}
