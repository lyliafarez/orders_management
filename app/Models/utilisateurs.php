<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\commandes;
class utilisateurs extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'email'
    ];

    protected $appends = [
        'nom_complet',
       
    ];

    public function getNomCompletAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    public function commandes(){
        return $this->hasMany(commandes::class,'utilisateur_id');
    }


}
