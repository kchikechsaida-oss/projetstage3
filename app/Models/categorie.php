<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
   protected $primaryKey = 'idCategorie';  
    protected $fillable = ['nomCategorie' ];
}
