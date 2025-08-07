<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartageRecette extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'base',
        'etape',
        'photo',
        'user_id',
        'coms',
        'jaime',
    ];
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'recette_id');
    }
}
