<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    /**
     * Un ingrédient appartient à une seule recette.
     */
    public function recettes()
    {
        return $this->belongsToMany(PartageRecette::class, 'quantiters', 'ingredient_id', 'recette_id')
                    ->withPivot('quantite');
    }
}
