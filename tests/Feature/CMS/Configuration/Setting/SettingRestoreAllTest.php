<?php

namespace Tests\Feature\CMS\Configuration\Setting;

use App\Models\Setting;
use Tests\TestCase;

class SettingRestoreAllTest extends TestCase
{
    public $categories;

    public function setUp(): void
    {
        parent::setUp();

        $this->categories = Setting::factory()->count(3)->create();

        $this->url = route('cms.configuration.setting.restore-all');
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
        $this->categories[0]->delete();
        $this->categories[1]->delete();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/setting/trash');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/setting/trash');
        $response->assertRedirectToRoute('cms.configuration.setting.trash');

        $this->categories[0]->refresh();
        $this->categories[1]->refresh();

        $this->assertEquals(Setting::count(), 3);
        $this->assertEquals($this->categories[0]->deleted_at, null);
        $this->assertEquals($this->categories[1]->deleted_at, null);
        $this->assertEquals($this->categories[2]->deleted_at, null);
    }
}
