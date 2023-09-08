<?php

namespace Tests\Feature;

use App\Livewire\Home\HomePage;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->url = route('index');
    }

    public function test_language(): void
    {
        $response = $this->get($this->url);
        $response->assertDontSee('index.');
        $response->assertDontSee('validation.');
        $response->assertDontSee('custom.');
    }

    public function test_see_livewire(): void
    {
        $response = $this->get($this->url);
        $response->assertSeeLivewire(HomePage::class);
    }

    public function test_status(): void
    {
        $response = $this->get($this->url);
        $response->assertOk();
        $response->assertSuccessful();
        $response->assertStatus(200);
    }
}
