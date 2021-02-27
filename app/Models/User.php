<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type_utilisateur_id',
        'region_id',
        'nom',
        'prenom',
        'nompere',
        'nommere',
        'sexe',
        'datenaissance',
        'profession',
        'adresse',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes=['etat'=> 0];

    /*    protected $guarded = [];
    etat egale 0 ce qui veut dire que l'utilisateur na pas encore voté a sa creation
    
    'type_utilisateur_id'=> 1,
    'region_id'=> 1,
    'email'=> 'admin@material.com',
    'password'=> '$2y$10$HxKatqghn3JP3fBOVRb1wu52vPeBpmOS6GillhXqfKulIIKJDkN4C',
    'name'=> 'Admin Admin',
      ];*/


      public function type_utilisateur()
    {
        return $this->belongsTo('App\Models\TypeUtilisateur');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }
}
