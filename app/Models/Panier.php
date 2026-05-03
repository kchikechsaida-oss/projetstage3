<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $table = 'paniers';
    protected $primaryKey = 'idPanier';  
    protected $fillable = ['quantite' ];
}
