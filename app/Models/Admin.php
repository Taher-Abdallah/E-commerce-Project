<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function role()
    {
        return $this->belongsTo(Role::class); 
    }

    public function hasAccess($key)
    {
        $role=$this->role;
        foreach($role->permission as $permis){
            if($key == $permis ?? false) {
                return true;
            }
        }
    }

}
