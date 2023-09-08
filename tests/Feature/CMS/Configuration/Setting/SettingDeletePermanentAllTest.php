<?php

namespace Tests\Feature\CMS\Configuration\Setting;

use App\Models\Setting;
use Tests\TestCase;

class SettingDeletePermanentAllTest extends TestCase
{
    public $settings;

    public function setUp(): void
    {
        parent::setUp();

        $this->settings = Setting::factory()->count(3)->create();

        $this->url = route('cms.configuration.setting.delete-permanent-all');
    }

    public function test_authenticated(): void
    {
        $response = $this->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/login');
        $response->assertRedirect(env('APP_CMS_URL').'/login');
        $response->assertRedirectToRoute('cms.login');
    }

    public function test_success(): void
    {
        $this->settings[0]->delete();
        $this->settings[1]->delete();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/setting/trash');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/setting/trash');
        $response->assertRedirectToRoute('cms.configuration.setting.trash');

        $this->assertEquals(Setting::count(), 1);
        $this->assertEquals($this->settings[2]->deleted_at, null);
    }
}
