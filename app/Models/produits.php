<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produits extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'prix',
        'stock'
    ];

    public function detailscommande(){
        return $this->hasMany(detailscommande::class,'produit_id');
    }

}
