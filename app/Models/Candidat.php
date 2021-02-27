<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }
}
