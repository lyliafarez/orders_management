<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\produits;

class detailscommande extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'produit_id',
        'quantite'
    ];

    public function produit(){
        $this->hasOne(produits::class);
    }

    public function commande(){
        return $this->belongsTo(commandes::class);
    }

}
