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
            'first_name' => ucfirst($this->first_name),
            'last_name' => ucfirst($this->last_name),
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'profile_picture_url' => $this->profile_picture_url,
            'profile_photo_path' => $this->profile_photo_path,
        ];
    }
}
