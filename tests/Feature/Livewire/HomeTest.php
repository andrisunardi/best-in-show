<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Home\HomePage;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_language(): void
    {
        Livewire::test(HomePage::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.');
    }

    public function test_redirect(): void
    {
        Livewire::actingAs($this->auth)
            ->test(HomePage::class)
            ->assertNoRedirect();
    }

    public function test_view_is(): void
    {
        Livewire::actingAs($this->auth)
            ->test(HomePage::class)
            ->assertViewIs('livewire.home.index');
    }

    public function test_status(): void
    {
        Livewire::test(HomePage::class)
            ->assertOk()
            ->assertSuccessful()
            ->assertStatus(200);
    }
}
