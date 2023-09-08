<?php

namespace Tests\Feature\CMS;

use App\Http\Livewire\CMS\HomePage;
use App\Models\Setting;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->url = route('cms.index');
    }

    public function test_language(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertDontSee('index.');
        $response->assertDontSee('validation.');
        $response->assertDontSee('custom.');
    }

    public function test_redirect(): void
    {
        $response = $this->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/login');
        $response->assertRedirect(env('APP_CMS_URL').'/login');
        $response->assertRedirectToRoute('cms.login');
    }

    public function test_authenticated(): void
    {
        $this->get($this->url);
        $this->assertGuest();

        $this->actingAs($this->auth)->get($this->url);
        $this->assertAuthenticated('web');
        $this->assertAuthenticatedAs($this->auth, 'web');
    }

    public function test_see_livewire(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSeeLivewire(HomePage::class);
    }

    public function test_status(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertOk();
        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    public function test_see_data(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Activity');
        $response->assertSee(Activity::count());
        $response->assertSee(env('APP_CMS_URL').'/configuration/activity');
        $response->assertSee('User');
        $response->assertSee(User::count());
        $response->assertSee(env('APP_CMS_URL').'/configuration/user');
        $response->assertSee('Role');
        $response->assertSee(Role::count());
        $response->assertSee(env('APP_CMS_URL').'/configuration/role');
        $response->assertSee('Permission');
        $response->assertSee(Permission::count());
        $response->assertSee(env('APP_CMS_URL').'/configuration/permission');
        $response->assertSee('Setting');
        $response->assertSee(Setting::count());
        $response->assertSee(env('APP_CMS_URL').'/configuration/setting');
    }
}
