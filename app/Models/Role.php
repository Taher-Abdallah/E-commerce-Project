<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $casts = [
        'permission' => 'array',
    ];
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}
