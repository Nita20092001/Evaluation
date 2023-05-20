<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;


class Utilisateur extends Model
{
    use HasFactory, AuthenticatableTrait,Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profil',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'utilisateurs';
}
