<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Employe;
class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
        'categorie',
        'foreign_id_id',
    ];
    // public function employe(): BelongsTo
    // {
    //     return $this->belongsTo(Employe::class);
    // }
}
