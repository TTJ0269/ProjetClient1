<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConnexionController extends Controller
{
    //Pour revoyer le formulaire de connexion
    public function formulaire()
    {
        try
        {
           return view('Connexions.connexion');
        }
        catch(\Exception $exception)
        {
            return ' Une erreur s"est produite veuillez contactez le service pour plus d" information';
        }
    } 
 
 
    //Pour traiter les informations de connexion
    public function traitement()
    {
     
            request()->validate([
            'email'=> ['required','email'],
            'hashpassword'=> ['required'],
            'password'=> ['required','min:6'],
    
            ]);
        try
        {
            $email=request('email');
            $password=request('password');
            $hashpassword=request('hashpassword');
            $confirmation=request('password_confirmation');

            $reponse = DB::table('users')
            ->where('users.password','=',$hashpassword)
            ->select('users.email')
            ->first();

            /****** actualiser  *******/
            if($reponse==null)
            {
             return redirect('verification')->with('messagealert', 'Email ou mot de passe incorrects.');
            }
            elseif($password!=$confirmation)
            {
             return redirect('verification')->with('messagealert', 'Mot de passe différent.');
            }
            elseif($reponse->email==$email)
            {
                $user = DB::table('users')
                ->where('users.email','=',$email)
                ->update(['users.password' => Hash::make($password)]);

                return redirect('/')->with('message','Votre mot de passe a été bien modifié. Veuillez cliquer sur "Se connecter" pour vous connectez');
            }
            return redirect('verification')->with('messagealert', 'Email ou mot de passe incorrects.');    
                
        }
        catch(\Exception $exception)
        {
             return ' Une erreur s"est produite veuillez contactez le service pour plus d" information';
        }

         

         /*  $resultat = auth()->attempt([
             'email' => request('email'),
             'password'=> request('hashpassword'),
         ]);
         
         if($resultat)
        {
            return redirect('\utilisateurs');
        }   
        return back()->withInput();*/
    }
}
 
     
