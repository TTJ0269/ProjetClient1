<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Republique extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function regions()
    {
        return $this->hasMany('App\Models\Region');
    }
}
