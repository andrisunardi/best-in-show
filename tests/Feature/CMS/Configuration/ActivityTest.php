<?php

namespace Tests\Feature\CMS\Configuration;

use App\Http\Livewire\CMS\Configuration\ActivityPage;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    public $activity;

    public function setUp(): void
    {
        parent::setUp();

        $this->activity = Activity::first();

        $this->url = route('cms.configuration.activity');
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
        $response->assertSeeLivewire(ActivityPage::class);
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
        $response->assertSee('Reset Filter');
    }

    public function test_see_search(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('Log Name');
        $response->assertSee('log_name');
        $response->assertSee('Description');
        $response->assertSee('description');
        $response->assertSee('Event');
        $response->assertSee('event');
        $response->assertSee('Subject Type');
        $response->assertSee('subject_type');
        $response->assertSee('Subject');
        $response->assertSee('subject');
        $response->assertSee('Causer Type');
        $response->assertSee('causer_type');
        $response->assertSee('Causer');
        $response->assertSee('causer');
        $response->assertSee('Properties');
        $response->assertSee('properties');
        $response->assertSee('Batch UUID');
        $response->assertSee('batch_uuid');
        $response->assertSee('User');
        $response->assertSee('user');
    }

    public function test_see_column(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee('#');
        $response->assertSee('ID');
        $response->assertSee('Log Name');
        $response->assertSee('Description');
        $response->assertSee('Event');
        $response->assertSee('Subject');
        $response->assertSee('Causer');
        $response->assertSee('Properties');
        $response->assertSee('Batch UUID');
        $response->assertSee('Created At');
    }

    public function test_see_data(): void
    {
        $response = $this->actingAs($this->auth)->get($this->url);

        $this->auth->update(['name' => fake()->name()]);
        $this->auth->refresh();

        $this->activity = Activity::orderByDesc('id')->first();

        $response = $this->actingAs($this->auth)->get($this->url);
        $response->assertSee($this->activity->id);
        $response->assertSee($this->activity->log_name);
        $response->assertSee($this->activity->description);
        $response->assertSee(Str::translate($this->activity->event));
        $response->assertSee($this->activity->subject->id);
        $response->assertSee($this->activity->subject->name);
        $response->assertSee($this->activity->causer->id);
        $response->assertSee(env('APP_CMS_URL')."/configuration/user/view/{$this->auth->id}");
        $response->assertSee($this->activity->causer->name);
        $response->assertSee($this->activity->batch_uuid);
        $response->assertSee(json_encode($this->activity->changes['old'], JSON_PRETTY_PRINT));
        $response->assertSee(json_encode($this->activity->changes['attributes'], JSON_PRETTY_PRINT));
        $response->assertSee($this->activity->created_at->isoFormat('LLLL'));
        $response->assertSee($this->activity->created_at->diffForHumans());
    }

    public function test_search_log_name(): void
    {
        $data = ['log_name' => fake()->sentence()];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertDontSee($this->activity->description);

        $data = ['log_name' => $this->activity->log_name];

        $response = $this->actingAs($this->auth)->get($this->url.'?'.http_build_query($data));
        $response->assertSee($this->activity->description);
    }
}
