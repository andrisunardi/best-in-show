<?php

namespace Tests\Feature\CMS\Configuration\User;

use App\Models\User;
use Tests\TestCase;

class UserRestoreTest extends TestCase
{
    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->url = route('cms.configuration.user.restore', ['user' => $this->user->id]);
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
        $response = $this->actingAs($this->auth)->get(route('cms.configuration.user.index'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(404);
        $response->assertSee(route('cms.configuration.user.index'));
    }

    public function test_success(): void
    {
        $this->user->delete();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL'));
        $response->assertRedirect(env('APP_CMS_URL'));
        $response->assertRedirectToRoute('cms.index');

        $this->user->refresh();
        $this->assertEquals($this->user->deleted_at, null);
        $this->assertEquals(User::count(), 3);
    }

    public function test_success_redirect_previous_url_from_view(): void
    {
        $this->user->delete();

        $response = $this->actingAs($this->auth)->get(route('cms.configuration.user.view', ['user' => $this->user->id]));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL')."/configuration/user/view/{$this->user->id}");
        $response->assertRedirect(env('APP_CMS_URL')."/configuration/user/view/{$this->user->id}");
        $response->assertRedirectToRoute('cms.configuration.user.view', ['user' => $this->user->id]);

        $this->user->refresh();
        $this->assertEquals($this->user->deleted_at, null);
        $this->assertEquals(User::count(), 3);
    }

    public function test_success_redirect_previous_url_from_trash(): void
    {
        $this->user->delete();

        $response = $this->actingAs($this->auth)->get(route('cms.configuration.user.trash'));
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/user/trash');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/user/trash');
        $response->assertRedirectToRoute('cms.configuration.user.trash');

        $this->user->refresh();
        $this->assertEquals($this->user->deleted_at, null);
        $this->assertEquals(User::count(), 3);
    }
}
