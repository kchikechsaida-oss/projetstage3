<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
   protected $primaryKey = 'idProduit'; 
    protected $fillable = ['dateCommande', 'statut' ];
}
