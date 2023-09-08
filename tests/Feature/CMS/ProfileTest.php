<?php

namespace Tests\Feature\CMS;

use App\Http\Livewire\CMS\Profile\ProfilePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->url = route('cms.profile.index');
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
        $response->assertSeeLivewire(ProfilePage::class);
    }

    public function test_status(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertOk();
        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    public function test_see_menu(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Profile');
        $response->assertSee('Activity Log');
        $response->assertSee('Edit Profile');
        $response->assertSee('Change Password');
        $response->assertSee('Logout');
    }

    public function test_see_profile(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Role');
        $response->assertSee(Auth::user()->getRoleNames()->join(', '));
        $response->assertSee('Name');
        $response->assertSee(Auth::user()->name);
        $response->assertSee('Email');
        $response->assertSee(Auth::user()->email);
        $response->assertSee('Username');
        $response->assertSee(Auth::user()->username);
        $response->assertSee('Phone');
        $response->assertSee(Auth::user()->phone);
        $response->assertSee('Active');
        $response->assertSee(Str::active(Auth::user()->is_active));
        $response->assertSee('Created By');
        $response->assertSee(Auth::user()->createdBy?->name);
        $response->assertSee('Updated By');
        $response->assertSee(Auth::user()->updatedBy?->name);
        $response->assertSee('Created At');
        $response->assertSee(Auth::user()->created_at->isoFormat('LLLL'));
        $response->assertSee(Auth::user()->created_at->diffForHumans());
        $response->assertSee('Updated At');
        $response->assertSee(Auth::user()->updated_at->isoFormat('LLLL'));
        $response->assertSee(Auth::user()->updated_at->diffForHumans());
    }

    public function test_see_last_activity(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $lastActivity = Auth::user()->activities->loadMissing('subject', 'causer')->last();

        $response->assertSee('Last Activity');
        $response->assertSee($lastActivity->log_name);
        $response->assertSee($lastActivity->subject_id);
        $response->assertSee($lastActivity->subject?->name);
        $response->assertSee(Str::translate($lastActivity->event));
        $response->assertSee($lastActivity->description);
        $response->assertSee($lastActivity->causer?->name);
        $response->assertSee($lastActivity->created_at->isoFormat('LLLL'));
        $response->assertSee($lastActivity->created_at->diffForHumans());
    }

    public function test_see_roles_and_permissions(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Roles And Permissions');
        $response->assertSee(Auth::user()->getRoleNames()[0]);
    }
}
