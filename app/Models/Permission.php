<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Laratrust\Models\Permission as PermissionModel;

class Permission extends Model
{
    public $guarded = [];

    protected $fillable = ['name', 'display_name', 'description'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
