<?php

namespace Tests\Feature\API;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->url = route('api.index');
    }

    public function test_index(): void
    {
        $response = $this->get($this->url);
        $response->assertOk();
        $response->assertSuccessful();
        $response->assertStatus(200);
    }
}
