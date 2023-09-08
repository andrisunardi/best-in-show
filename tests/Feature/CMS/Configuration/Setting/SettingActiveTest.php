<?php

namespace Tests\Feature\CMS\Configuration\Setting;

use App\Models\Setting;
use Tests\TestCase;

class SettingActiveTest extends TestCase
{
    public $setting;

    public function setUp(): void
    {
        parent::setUp();

        $this->setting = Setting::factory()->active()->create();

        $this->url = route('cms.configuration.setting.active', ['setting' => $this->setting->id]);
    }

    public function test_authenticated(): void
    {
        $response = $this->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/login');
        $response->assertRedirect(env('APP_CMS_URL').'/login');
        $response->assertRedirectToRoute('cms.login');
    }

    public function test_deleted(): void
    {
        $this->setting->delete();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(404);
        $response->assertSee(route('cms.index'));
    }

    public function test_deleted_redirect_previous_url(): void
    {
        $this->setting->delete();

        $response = $this->actingAs($this->auth)->get(route('cms.configuration.setting.index'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(404);
        $response->assertSee(route('cms.configuration.setting.index'));
    }

    public function test_success(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL'));
        $response->assertRedirect(env('APP_CMS_URL'));
        $response->assertRedirectToRoute('cms.index');

        $this->setting->refresh();
        $this->assertEquals($this->setting->is_active, false);
    }

    public function test_success_redirect_previous_url(): void
    {
        $this->setting->update(['is_active' => false]);

        $response = $this->actingAs($this->auth)->get(route('cms.configuration.setting.index'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/setting');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/setting');
        $response->assertRedirectToRoute('cms.configuration.setting.index');

        $this->setting->refresh();
        $this->assertEquals($this->setting->is_active, true);
    }
}
