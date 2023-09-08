<?php

namespace Tests\Feature\CMS\Configuration\Setting;

use App\Http\Livewire\CMS\Configuration\Setting\SettingPage;
use App\Models\Setting;
use Illuminate\Support\Str;
use Tests\TestCase;

class SettingTest extends TestCase
{
    public $setting;

    public function setUp(): void
    {
        parent::setUp();

        $this->setting = Setting::factory()->create();

        $this->url = route('cms.configuration.setting.index');
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
        $response->assertSeeLivewire(SettingPage::class);
    }

    public function test_status(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertOk();
        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    public function test_see_button(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Add');
        $response->assertSee(env('APP_CMS_URL').'/configuration/setting/add');
        $response->assertSee('Trash');
        $response->assertSee(env('APP_CMS_URL').'/configuration/setting/trash');
        $response->assertSee('Reset Filter');
    }

    public function test_see_search(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Key');
        $response->assertSee('key');
        $response->assertSee('Value');
        $response->assertSee('value');
        $response->assertSee('Active');
        $response->assertSee('is_active');
        $response->assertSee('Yes');
        $response->assertSee('No');
    }

    public function test_see_column(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('#');
        $response->assertSee('ID');
        $response->assertSee('Key');
        $response->assertSee('Value');
        $response->assertSee('Active');
        $response->assertSee('Action');
    }

    public function test_see_data(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee($this->setting->id);
        $response->assertSee(env('APP_CMS_URL')."/configuration/setting/view/{$this->setting->id}");
        $response->assertSee($this->setting->key);
        $response->assertSee($this->setting->value);
        $response->assertSee(Str::yesno($this->setting->is_active));
        $response->assertSee('View');
        $response->assertSee(env('APP_CMS_URL')."/configuration/setting/view/{$this->setting->id}");
        $response->assertSee('Clone');
        $response->assertSee(env('APP_CMS_URL')."/configuration/setting/clone/{$this->setting->id}");
        $response->assertSee('Edit');
        $response->assertSee(env('APP_CMS_URL')."/configuration/setting/edit/{$this->setting->id}");
        $response->assertSee(Str::active(! $this->setting->is_active));
        $response->assertSee(env('APP_CMS_URL')."/configuration/setting/active/{$this->setting->id}");
        $response->assertSee('Delete');
        $response->assertSee(env('APP_CMS_URL')."/configuration/setting/delete/{$this->setting->id}");
    }

    public function test_search_key(): void
    {
        $data = ['key' => fake()->sentence()];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->setting->key);

        $data = ['key' => $this->setting->key];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->setting->key);
    }

    public function test_search_value(): void
    {
        $data = ['value' => fake()->sentence()];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->setting->key);

        $data = ['value' => $this->setting->value];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->setting->key);
    }

    public function test_search_is_active(): void
    {
        $data = ['is_active' => [! $this->setting->is_active]];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->setting->key);

        $data = ['is_active' => [$this->setting->is_active]];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->setting->key);
    }
}
