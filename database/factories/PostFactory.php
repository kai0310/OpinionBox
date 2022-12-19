<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }

    public function approved(): self
    {
        return $this->state(function (): array {
            return [
                'approved_at' => now(),
            ];
        });
    }

    public function published(): self
    {
        return $this->state(function (): array {
            return [
                'published' => now(),
            ];
        });
    }

    public function hide(): self
    {
        return $this->state(function (): array {
            return [
                'hide_at' => now(),
            ];
        });
    }

    public function markAsResolved(): self
    {
        return $this->state(function (): array {
            return [
                'resolved_user_id' => User::factory()->create()->id,
                'resolved_at' => now(),
            ];
        });
    }
}
