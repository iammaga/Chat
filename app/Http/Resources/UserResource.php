<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'profile_picture_url' => $this->profile_picture_url,
            'profile_photo_path' => $this->profile_photo_path,
            'email' => $this->email,
        ];
    }
}
