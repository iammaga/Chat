<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MessageStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MessageStatus>
 */
class MessageStatusFactory extends Factory
{
    protected $model = MessageStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'message_id' => $this->faker->numberBetween(1, 10), // Adjust range as needed
            'status' => $this->faker->word,
        ];
    }
}
