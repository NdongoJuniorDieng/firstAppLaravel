<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'addresse',
        'numero_tel',
    ];

    public function produit():HasOne{
        return $this->hasOne(Produit::class,'employes_id');
    }

}
