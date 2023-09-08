<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    // use RefreshDatabase;
    use WithFaker;
    use LazilyRefreshDatabase;

    public $auth;

    public $url;

    public function setUp(): void
    {
        parent::setUp();

        Config::set('app.locale', 'en');

        $this->seed();

        $this->auth = User::first();
    }
}
