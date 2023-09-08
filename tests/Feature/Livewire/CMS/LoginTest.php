<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\LoginPage;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_language(): void
    {
        Livewire::test(LoginPage::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.');
    }

    public function test_redirect(): void
    {
        Livewire::test(LoginPage::class)
            ->assertNoRedirect();

        Livewire::actingAs($this->auth)
            ->test(LoginPage::class)
            ->assertLocation(env('APP_URL'))
            ->assertRedirect(env('APP_CMS_URL'));
    }

    public function test_view_is(): void
    {
        Livewire::test(LoginPage::class)
            ->assertViewIs('livewire.cms.login.index');
    }

    public function test_status(): void
    {
        Livewire::test(LoginPage::class)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_see(): void
    {
        Livewire::test(LoginPage::class)
            ->assertSee('Login')
            ->assertSee('Username')
            ->assertSee('Password')
            ->assertSee('Stay Login')
            ->assertSee('username')
            ->assertSee('password')
            ->assertSee('remember')
            ->assertSee('submit');
    }

    public function test_validation_required(): void
    {
        $username = null;
        $password = null;

        Livewire::test(LoginPage::class)
            ->set('username', $username)
            ->set('password', $password)
            ->call('submit')
            ->assertHasErrors([
                'username' => 'required',
                'password' => 'required',
            ])
            ->assertSet('username', $username)
            ->assertSet('password', $password)
            ->assertViewHas('username', $username)
            ->assertViewHas('password', $password)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_validation_max(): void
    {
        $username = Str::random(51);
        $password = Str::random(51);

        Livewire::test(LoginPage::class)
            ->set('username', $username)
            ->set('password', $password)
            ->call('submit')
            ->assertHasErrors([
                'username' => 'max:50',
                'password' => 'max:50',
            ])
            ->assertSet('username', $username)
            ->assertSet('password', $password)
            ->assertViewHas('username', $username)
            ->assertViewHas('password', $password)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_validation_exists(): void
    {
        $username = fake()->username();
        $password = null;

        Livewire::test(LoginPage::class)
            ->set('username', $username)
            ->set('password', $password)
            ->call('submit')
            ->assertHasErrors([
                'username' => 'exists',
            ])
            ->assertSet('username', $username)
            ->assertSet('password', $password)
            ->assertViewHas('username', $username)
            ->assertViewHas('password', $password)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_login_fail(): void
    {
        $username = $this->auth->username;
        $password = fake()->password();

        Livewire::test(LoginPage::class)
            ->set('username', $username)
            ->set('password', $password)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('username', $username)
            ->assertSet('password', $password)
            ->assertViewHas('username', $username)
            ->assertViewHas('password', $password)
            ->assertNoRedirect()
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);

        $this->assertGuest();
    }

    public function test_login_success(): void
    {
        $username = $this->auth->username;
        $password = '12345678';

        Livewire::test(LoginPage::class)
            ->set('username', $username)
            ->set('password', $password)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('username', $username)
            ->assertSet('password', $password)
            ->assertViewHas('username', $username)
            ->assertViewHas('password', $password)
            ->assertRedirect(env('APP_CMS_URL'))
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);

        $this->assertAuthenticated('web');
        $this->assertAuthenticatedAs($this->auth, 'web');
    }
}
