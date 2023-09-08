<?php

namespace Tests\Feature\CMS\Configuration\User;

use App\Livewire\CMS\Configuration\User\UserPage;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->url = route('cms.configuration.user.index');
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
        $response->assertSeeLivewire(UserPage::class);
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
        $response->assertSee(env('APP_CMS_URL').'/configuration/user/add');
        $response->assertSee('Trash');
        $response->assertSee(env('APP_CMS_URL').'/configuration/user/trash');
        $response->assertSee('Reset Filter');
    }

    public function test_see_search(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Name');
        $response->assertSee('name');
        $response->assertSee('Username');
        $response->assertSee('username');
        $response->assertSee('Email');
        $response->assertSee('email');
        $response->assertSee('Phone');
        $response->assertSee('phone');
        $response->assertSee('Role');
        $response->assertSee('role_id');
        $response->assertSee('Permission');
        $response->assertSee('permission_name');
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
        $response->assertSee('Image');
        $response->assertSee('Name');
        $response->assertSee('Username');
        $response->assertSee('Email');
        $response->assertSee('Phone');
        $response->assertSee('Role');
        $response->assertSee('Active');
        $response->assertSee('Action');
    }

    public function test_see_data(): void
    {
        $this->user->assignRole('Super User');
        $this->user->refresh();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee($this->user->id);
        $response->assertSee(env('APP_CMS_URL')."/configuration/user/view/{$this->user->id}");
        $response->assertSee($this->user->image);
        $response->assertSee($this->user->name);
        $response->assertSee($this->user->username);
        $response->assertSee($this->user->email);
        $response->assertSee($this->user->phone);
        $response->assertSee($this->user->roles[0]->name);
        $response->assertSee(Str::yesno($this->user->is_active));
        $response->assertSee('View');
        $response->assertSee(env('APP_CMS_URL')."/configuration/user/view/{$this->user->id}");
        $response->assertSee('Clone');
        $response->assertSee(env('APP_CMS_URL')."/configuration/user/clone/{$this->user->id}");
        $response->assertSee('Edit');
        $response->assertSee(env('APP_CMS_URL')."/configuration/user/edit/{$this->user->id}");
        $response->assertSee(Str::active(! $this->user->is_active));
        $response->assertSee(env('APP_CMS_URL')."/configuration/user/active/{$this->user->id}");
        $response->assertSee('Delete');
        $response->assertSee(env('APP_CMS_URL')."/configuration/user/delete/{$this->user->id}");
    }

    public function test_search_name(): void
    {
        $data = ['name' => fake()->name()];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->user->name);

        $data = ['name' => $this->user->name];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->user->name);
    }

    public function test_search_username(): void
    {
        $data = ['username' => fake()->username()];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->user->name);

        $data = ['username' => $this->user->username];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->user->name);
    }

    public function test_search_email(): void
    {
        $data = ['email' => fake()->email()];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->user->name);

        $data = ['email' => $this->user->email];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->user->name);
    }

    public function test_search_phone(): void
    {
        $data = ['phone' => fake()->phoneNumber()];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->user->name);

        $data = ['phone' => $this->user->phone];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->user->name);
    }

    public function test_search_role_id(): void
    {
        $role = Role::create([
            'name' => fake()->unique()->name,
            'guard_name' => 'web',
        ]);

        $data = ['role_id' => $role->id];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertStatus(200);
        $response->assertDontSee($this->user->name);

        $this->user->assignRole($role->id);
        $this->user->refresh();

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->user->name);
    }

    public function test_search_permission_name(): void
    {
        $permission = Permission::create([
            'name' => fake()->unique()->name,
            'guard_name' => 'web',
        ]);

        $data = ['permission_name' => $permission->name];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->user->name);

        $this->user->givePermissionTo($permission->id);
        $this->user->refresh();

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->user->name);
    }

    public function test_search_is_active(): void
    {
        $data = ['is_active' => [! $this->user->is_active]];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->user->name);

        $data = ['is_active' => [$this->user->is_active]];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->user->name);
    }
}
