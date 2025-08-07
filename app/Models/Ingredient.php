<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'recette_id',
    ];

    /**
     * Un ingrédient appartient à une seule recette.
     */
    public function recette()
    {
        return $this->belongsTo(PartageRecette::class, 'recette_id');
    }
}
