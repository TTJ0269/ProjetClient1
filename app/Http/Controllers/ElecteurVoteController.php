<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElecteurVoteController extends Controller
{
    public function participervote()
    {
        $utilisateurs_voter = DB::table('users')
        ->join('votes','users.id','=','votes.utilisateur_id')
        ->select('users.*')
        ->get();
      
        return view('Electeurvote.voteparticiper',compact('utilisateurs_voter'));
    }

    public function pasparticipervote()
    {
        $utilisateurs_pas_voter = DB::table('users')
        ->join('votes','users.id','!=','votes.utilisateur_id')
        ->select('users.*')
        ->get();
      
        return view('Electeurvote.votepasparticiper',compact('utilisateurs_pas_voter')); 
    }
}
