<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AvatarService
{
    /**
     * Получить случайный URL аватара.
     *
     * @return string
     */
    public function getRandomAvatarUrl()
    {
        $response = Http::get('https://reqres.in/api/users');

        $users = $response->json('data');

        $randomUser = $users[array_rand($users)];

        return $randomUser['avatar'];
    }
}
