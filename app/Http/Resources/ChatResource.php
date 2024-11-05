<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this->messages()->with('user')->latest()->first();

        return [
            'id' => $this->id,
            'name' => ucfirst($data->user->name),
            'surname' => ucfirst($data->user->surname),
            'profile_picture_path' => $data->user->profile_picture_path,
            'content' => $data->content,
            'time' => $data->created_at->diffForHumans(),
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}
