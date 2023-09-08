<?php

namespace Tests\Feature\CMS;

use App\Http\Livewire\CMS\LoginPage;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->url = route('cms.login');
    }

    public function test_language(): void
    {
        $response = $this->get($this->url);
        $response->assertDontSee('index.');
        $response->assertDontSee('validation.');
        $response->assertDontSee('custom.');
    }

    public function test_redirect(): void
    {
        $response = $this->actingAs($this->auth, 'web')->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL'));
        $response->assertRedirect(env('APP_CMS_URL'));
        $response->assertRedirectToRoute('cms.index');
    }

    public function test_see_livewire(): void
    {
        $response = $this->get($this->url);
        $response->assertSeeLivewire(LoginPage::class);
    }

    public function test_status(): void
    {
        $response = $this->get($this->url);
        $response->assertOk();
        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    public function test_see(): void
    {
        $response = $this->get($this->url);
        $response->assertSee('Login');
        $response->assertSee('Username');
        $response->assertSee('Password');
        $response->assertSee('Stay Login');
        $response->assertSee('username');
        $response->assertSee('password');
        $response->assertSee('remember');
        $response->assertSee('submit');
    }
}
