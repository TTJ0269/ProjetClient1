<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }

    public function candidat()
    {
        return $this->belongsTo('App\Models\Candidat');
    }
}
