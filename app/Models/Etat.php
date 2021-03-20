<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    use HasFactory;

    protected $attributes=['etat'=> 1,]; //signifie que l'éléction est ouverte
}
