<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $guarded = [];

     //Pour recuperer les regoins qui appartient à une republique
    public function republique()
    {
        return $this->belongsTo('App\Models\Republique');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
