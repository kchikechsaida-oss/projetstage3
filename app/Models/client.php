<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'idClient';  
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'telephone'];
}
