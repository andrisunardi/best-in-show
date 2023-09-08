<?php

namespace Tests\Feature\Livewire\CMS;

use App\Livewire\CMS\ForgotPassword\ForgotPasswordPage;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    public function test_language(): void
    {
        Livewire::test(ForgotPasswordPage::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.');
    }

    public function test_redirect(): void
    {
        Livewire::test(ForgotPasswordPage::class)
            ->assertNoRedirect();

        Livewire::actingAs($this->auth)
            ->test(ForgotPasswordPage::class)
            ->assertLocation(env('APP_CMS_URL'))
            ->assertRedirect(env('APP_CMS_URL'));
    }

    public function test_view_is(): void
    {
        Livewire::test(ForgotPasswordPage::class)
            ->assertViewIs('livewire.cms.forgot-password.index');
    }

    public function test_status(): void
    {
        Livewire::test(ForgotPasswordPage::class)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_see(): void
    {
        Livewire::test(ForgotPasswordPage::class)
            ->assertSee('Forgot Password')
            ->assertSee('Username')
            ->assertSee('Email')
            ->assertSee('Phone')
            ->assertSee('Confirm Reset')
            ->assertSee('Send Request')
            ->assertSee('username')
            ->assertSee('email')
            ->assertSee('phone')
            ->assertSee('confirm_reset')
            ->assertSee('submit');
    }

    public function test_validation_required(): void
    {
        $username = null;
        $email = null;
        $phone = null;
        $confirm_reset = null;

        Livewire::test(ForgotPasswordPage::class)
            ->set('username', $username)
            ->set('email', $email)
            ->set('phone', $phone)
            ->call('submit')
            ->assertHasErrors([
                'username' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'confirm_reset' => 'required',
            ])
            ->assertSet('username', $username)
            ->assertSet('email', $email)
            ->assertSet('phone', $phone)
            ->assertSet('confirm_reset', $confirm_reset)
            ->assertViewHas('username', $username)
            ->assertViewHas('email', $email)
            ->assertViewHas('phone', $phone)
            ->assertViewHas('confirm_reset', $confirm_reset)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_validation_max(): void
    {
        $username = Str::random(51);
        $email = Str::random(51);
        $phone = Str::random(51);

        Livewire::test(ForgotPasswordPage::class)
            ->set('username', $username)
            ->set('email', $email)
            ->set('phone', $phone)
            ->call('submit')
            ->assertHasErrors([
                'username' => 'max:50',
                'email' => 'max:50',
                'phone' => 'max:50',
            ])
            ->assertSet('username', $username)
            ->assertSet('email', $email)
            ->assertSet('phone', $phone)
            ->assertViewHas('username', $username)
            ->assertViewHas('email', $email)
            ->assertViewHas('phone', $phone)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_validation_exists(): void
    {
        $username = fake()->username();
        $email = fake()->email();
        $phone = fake()->phoneNumber();

        Livewire::test(ForgotPasswordPage::class)
            ->set('username', $username)
            ->set('email', $email)
            ->set('phone', $phone)
            ->call('submit')
            ->assertHasErrors([
                'username' => 'exists',
                'email' => 'exists',
                'phone' => 'exists',
            ])
            ->assertSet('username', $username)
            ->assertSet('email', $email)
            ->assertSet('phone', $phone)
            ->assertViewHas('username', $username)
            ->assertViewHas('email', $email)
            ->assertViewHas('phone', $phone)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_validation_email(): void
    {
        $email = fake()->name();

        Livewire::test(ForgotPasswordPage::class)
            ->set('email', $email)
            ->call('submit')
            ->assertHasErrors([
                'email' => 'email',
            ])
            ->assertSet('email', $email)
            ->assertViewHas('email', $email)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_validation_email_rfc_dns(): void
    {
        $email = 'email@invalid.test';

        Livewire::test(ForgotPasswordPage::class)
            ->set('email', $email)
            ->call('submit')
            ->assertHasErrors([
                'email' => 'email',
            ])
            ->assertSet('email', $email)
            ->assertViewHas('email', $email)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_validation_boolean(): void
    {
        $confirm_reset = fake()->name();

        Livewire::test(ForgotPasswordPage::class)
            ->set('confirm_reset', $confirm_reset)
            ->call('submit')
            ->assertHasErrors([
                'confirm_reset' => 'required',
                'confirm_reset' => 'boolean',
            ])
            ->assertSet('confirm_reset', $confirm_reset)
            ->assertViewHas('confirm_reset', $confirm_reset)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_forgot_password_fail(): void
    {
        $user = User::factory()->create();

        $username = $this->auth->username;
        $email = $user->email;
        $phone = $user->phone;
        $confirm_reset = true;

        $passwordOld = $this->auth->password;

        Livewire::test(ForgotPasswordPage::class)
            ->set('username', $username)
            ->set('email', $email)
            ->set('phone', $phone)
            ->set('confirm_reset', $confirm_reset)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('username', $username)
            ->assertSet('email', $email)
            ->assertSet('phone', $phone)
            ->assertSet('confirm_reset', $confirm_reset)
            ->assertViewHas('username', $username)
            ->assertViewHas('email', $email)
            ->assertViewHas('phone', $phone)
            ->assertViewHas('confirm_reset', $confirm_reset)
            ->assertNoRedirect()
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);

        $this->auth->refresh();

        $this->assertNotEquals($this->auth->updated_at, now());
        $this->assertEquals($this->auth->password, $passwordOld);
    }

    public function test_forgot_password_success(): void
    {
        $username = $this->auth->username;
        $email = $this->auth->email;
        $phone = $this->auth->phone;
        $confirm_reset = true;

        $passwordOld = $this->auth->password;

        Livewire::test(ForgotPasswordPage::class)
            ->set('username', $username)
            ->set('email', $email)
            ->set('phone', $phone)
            ->set('confirm_reset', $confirm_reset)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('username', $username)
            ->assertSet('email', $email)
            ->assertSet('phone', $phone)
            ->assertSet('confirm_reset', $confirm_reset)
            ->assertRedirect(env('APP_CMS_URL').'/login')
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);

        $this->auth->refresh();

        $this->assertEquals($this->auth->updated_at->format('c'), now()->format('c'));
        $this->assertNotEquals($this->auth->password, $passwordOld);
    }
}
