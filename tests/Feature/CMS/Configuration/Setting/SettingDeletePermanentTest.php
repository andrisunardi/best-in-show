<?php

namespace Tests\Feature\CMS\Configuration\Setting;

use App\Models\Setting;
use Tests\TestCase;

class SettingDeletePermanentTest extends TestCase
{
    public $setting;

    public function setUp(): void
    {
        parent::setUp();

        $this->setting = Setting::factory()->create();

        $this->url = route('cms.configuration.setting.delete-permanent', ['setting' => $this->setting->id]);
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
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(404);
        $response->assertSee(route('cms.index'));
    }

    public function test_deleted_redirect_previous_url(): void
    {
        $response = $this->actingAs($this->auth)->get(route('cms.configuration.setting.index'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(404);
        $response->assertSee(route('cms.configuration.setting.index'));
    }

    public function test_success(): void
    {
        $this->setting->delete();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/setting');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/setting');
        $response->assertRedirectToRoute('cms.configuration.setting.index');

        $this->assertEquals(Setting::count(), 0);
    }

    public function test_success_redirect_previous_url_from_view(): void
    {
        $this->setting->delete();

        $response = $this->actingAs($this->auth)->get(route('cms.configuration.setting.view', ['setting' => $this->setting->id]));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/setting');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/setting');
        $response->assertRedirectToRoute('cms.configuration.setting.index');

        $this->assertEquals(Setting::count(), 0);
    }

    public function test_success_redirect_previous_url_from_trash(): void
    {
        $this->setting->delete();

        $response = $this->actingAs($this->auth)->get(route('cms.configuration.setting.trash'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/setting/trash');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/setting/trash');
        $response->assertRedirectToRoute('cms.configuration.setting.trash');

        $this->assertEquals(Setting::count(), 0);
    }
}
