<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $primaryKey = 'idClient';  
    protected $fillable = ['nom', 'prenom', 'email', 'password','telephone'];
}
