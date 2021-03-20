<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElecteurVoteController extends Controller
{
    public function participervote()
    {
        try
        {
            $utilisateurs_voter = DB::table('users')
            ->join('votes','users.id','=','votes.utilisateur_id')
            ->select('users.*')
            ->get();
            $nombre_voter = DB::select('select count(id) as nombre from users where id in (select utilisateur_id from votes);');
        
            return view('Electeurvote.voteparticiper',compact('utilisateurs_voter','nombre_voter'));
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }

    public function pasparticipervote()
    {
        try
        {
            $utilisateurs_pas_voter = DB::select('select * from users where id not in (select utilisateur_id from votes)');
            $nombre_pas_voter = DB::select('select count(id) as nombre from users where id not in (select utilisateur_id from votes)');

            return view('Electeurvote.votepasparticiper',compact('utilisateurs_pas_voter','nombre_pas_voter')); 
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }
}
