<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageStatus extends Model
{
    use HasFactory;

    protected $fillable = ['message_id', 'status'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
