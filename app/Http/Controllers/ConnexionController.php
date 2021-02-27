<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    //Pour revoyer le formulaire de connexion
    public function formulaire()
    {
        return view('Connexions.connexion');
    } 
 
 
    //Pour traiter les informations de connexion
    public function traitement()
    {
          request()->validate([
         'email'=> ['required','email'],
         'password'=> ['required']
 
     ]);
         $resultat = auth()->attempt([
             'email' => request('email'),
             'password'=> request('password'),
         ]);
 
         var_dump($resultat);

         /*   if($resultat)
        {
            return redirect('\utilisateurs');
        }   
        return back()->withInput();*/
    }
}
 
     
