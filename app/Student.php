<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = ['nim', 'password', 'nama', 'email', 'hp', 'alamat'];
    protected $hidden = ['password'];
}
