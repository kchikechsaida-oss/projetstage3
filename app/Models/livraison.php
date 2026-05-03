<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livraison extends Model
{
    protected $primaryKey = 'idLivraison';
    protected $fillable = ['adresse', 'ville', 'statut' ];
} 
        
