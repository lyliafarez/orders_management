<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\utilisateurs;
use App\Models\detailscommande;
class commandes extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_commande',
        'utilisateur_id'
    ];

    public function utilisateur(){
        return $this->belongsTo(utilisateurs::class);
    }

    public function details(){
        return $this->hasMany(detailscommande::class,'commande_id');
    }

}
