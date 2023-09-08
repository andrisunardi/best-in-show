<?php

namespace Tests\Feature\CMS\Configuration\User;

use App\Models\User;
use Tests\TestCase;

class UserRestoreAllTest extends TestCase
{
    public $users;

    public function setUp(): void
    {
        parent::setUp();

        $this->users = User::factory()->count(3)->create();

        $this->url = route('cms.configuration.user.restore-all');
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
        $this->users[0]->delete();
        $this->users[1]->delete();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertStatus(302);
        $response->assertLocation(env('APP_CMS_URL').'/configuration/user/trash');
        $response->assertRedirect(env('APP_CMS_URL').'/configuration/user/trash');
        $response->assertRedirectToRoute('cms.configuration.user.trash');

        $this->users[0]->refresh();
        $this->users[1]->refresh();

        $this->assertEquals(User::count(), 5);
        $this->assertEquals($this->users[0]->deleted_at, null);
        $this->assertEquals($this->users[1]->deleted_at, null);
        $this->assertEquals($this->users[2]->deleted_at, null);
    }
}
