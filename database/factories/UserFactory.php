<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->freeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'username' => fake()->unique()->userName(),
            'password' => Hash::make(12345678),
            'image' => null,
            'remember_token' => Str::random(10),
            'is_active' => fake()->boolean(),
        ];
    }

    public function active(): static
    {
        return $this->state(fn () => ['is_active' => true]);
    }

    public function inActive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }

    public function image(): static
    {
        $name = fake()->unique()->name();
        $slug = Str::slug($name);
        $image = "{$slug}.png";

        File::copy(
            public_path('images/image.png'),
            public_path("images/user/{$image}"),
        );

        return $this->state(fn () => [
            'name' => $name,
            'image' => $image,
            'is_active' => true,
        ]);
    }
}
