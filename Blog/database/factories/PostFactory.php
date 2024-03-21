<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::first();
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'enabled' => fake() -> boolean(),
            'published_at' => fake() -> dateTime(),
            'user_id' => $user->id,
        ];
    }
}
