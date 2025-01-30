<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(3, true),
            'recipient' => $this->faker->email,
            'sent_date' => $this->faker->dateTimeBetween('now', '+10 days', ),
            'is_published' => true,
            'heart_count' => $this->faker->numberBetween(0,100),
        ];
    }
}
