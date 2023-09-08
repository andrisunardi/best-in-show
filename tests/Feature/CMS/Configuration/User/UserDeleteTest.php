<?php

namespace Tests\Feature\CMS\Configuration\User;

use App\Models\User;
use Tests\TestCase;

class UserDeleteTest extends TestCase
{
    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->url = route('cms.configuration.user.delete', ['user' => $this->user->id]);
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
        $this->user->delete();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(404);
        $response->assertSee(route('cms.index'));
    }

    public function test_deleted_redirect_previous_url(): void
    {
        $this->user->delete();

        $response = $this->actingAs($this->auth)->get(route('cms.configuration.user.index'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(404);
        $response->assertSee(route('cms.configuration.user.index'));
    }

    public function test_success(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL'));
        $response->assertRedirect(env('APP_CMS_URL'));
        $response->assertRedirectToRoute('cms.index');

        $this->user->refresh();
        $this->assertEquals($this->user->deleted_at->format('c'), now()->format('c'));
        $this->assertEquals(User::count(), 2);
    }

    public function test_success_redirect_previous_url(): void
    {
        $response = $this->actingAs($this->auth)->get(route('cms.configuration.user.index'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/user');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/user');
        $response->assertRedirectToRoute('cms.configuration.user.index');

        $this->user->refresh();
        $this->assertEquals($this->user->deleted_at->format('c'), now()->format('c'));
        $this->assertEquals(User::count(), 2);
    }
}
