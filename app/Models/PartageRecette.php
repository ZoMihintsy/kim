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
        'ingredient',
        'etape',
        'photo',
        'user_id',
        'coms',
        'jaime',
    ];
}
