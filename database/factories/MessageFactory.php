<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Message;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chat_id' => $this->faker->numberBetween(1, 10), // Adjust range as needed
            'user_id' => $this->faker->numberBetween(1, 10), // Adjust range as needed
            'content' => $this->faker->text,
        ];
    }
}
