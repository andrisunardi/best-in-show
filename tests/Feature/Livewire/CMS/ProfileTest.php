<?php

namespace Tests\Feature\Livewire\CMS;

use App\Livewire\CMS\Profile\ProfilePage;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    public function test_language(): void
    {
        Livewire::actingAs($this->auth)
            ->test(ProfilePage::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.');
    }

    public function test_redirect(): void
    {
        Livewire::actingAs($this->auth)
            ->test(ProfilePage::class)
            ->assertNoRedirect();
    }

    public function test_view_is(): void
    {
        Livewire::actingAs($this->auth)
            ->test(ProfilePage::class)
            ->assertViewIs('livewire.cms.profile.index');
    }

    public function test_status(): void
    {
        Livewire::actingAs($this->auth)
            ->test(ProfilePage::class)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }

    public function test_see_menu(): void
    {
        Livewire::actingAs($this->auth)
            ->test(ProfilePage::class)
            ->assertSee('Profile')
            ->assertSee('Activity Log')
            ->assertSee('Edit Profile')
            ->assertSee('Change Password')
            ->assertSee('Logout');
    }
}
