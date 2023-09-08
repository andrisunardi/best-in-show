<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageNotFoundTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->url = url('test');
    }

    public function test_language(): void
    {
        $response = $this->get($this->url);
        $response->assertDontSee('index.');
        $response->assertDontSee('validation.');
        $response->assertDontSee('custom.');
    }

    public function test_status(): void
    {
        $response = $this->get($this->url);
        $response->assertSee('404');
        $response->assertStatus(404);
        $response->assertNotFound();
    }
}
