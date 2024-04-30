<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory,
        Notifiable,
        HasApiTokens,
        HasRoles;

    protected $table = 'users';

    protected $visible = [
        'id',
        'name',
        'user_name',
        'role',
    ];
    protected $fillable = [
        'name',
        'password',
        'user_name',
        'role',
    ];
    protected $hidden = [
        'password',
        'api_token',
    ];

}
