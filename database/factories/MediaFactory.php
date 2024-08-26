<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Media;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'chat_id' => Chat::inRandomOrder()->first()->id,
            'message_id' => Message::inRandomOrder()->first()->id,
            'media_url' => $this->faker->imageUrl(),
            'media_type' => $this->faker->word,
        ];
    }
}
