<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $primaryKey = 'idProduit'; // K كبيرة
    protected $fillable = ['description', 'nomP', 'prix', 'image', 'commentaire', 'note'];
}
