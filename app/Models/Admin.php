<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_Admin';

    protected $fillable = [
        'name_Admin',
        'email_Admin',
        'password_Admin',
    ];

    protected $hidden = [
        'password_Admin',
        'remember_token',
    ];
}