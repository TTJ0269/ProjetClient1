<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\Models\Etat;


class LimiteVoteController extends Controller
{

    public function __construct()
    {
        try
        {
            $this->middleware('auth');//->except(['index'])
            $this->middleware('limite');
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }

    public function limitevote()
    {
        try
        {
          return view('Vote.limitevote');
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }
    public function activervote()
    {
        try
        {
            $etat = DB::table('etats')
            ->where('etats.id','=',1)
            ->update(['etats.etat' => 1]);

            return back()->with('message', 'Vote bien activé.');
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }

    }

    public function desactiverVote()
    {
        try
        {
            $etat = DB::table('etats')
            ->where('etats.id','=',1)
            ->update(['etats.etat' => 0]);

            return back()->with('message', 'Vote bien désactivé.');
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }

  /*   public function voteauto()
    {
        $timedebutheure = Date::make(request('timedebut'))->format('H');
        $timefinheure = Date::make(request('timefin'))->format('H');
        $timedebutminute = Date::make(request('timedebut'))->format('i');
        $timefinminute = Date::make(request('timefin'))->format('i');
        $timedebut = request('timedebut');
        $timefin = request('timefin');

       // dd($timedebut);

        if($timedebutheure > $timefinheure && $timedebutminute >$timefinminute)
        {
            return back()->with('message', 'Heure de début est supérieur à heure de fin.');
        }
        elseif($timedebutheure == $timefinheure && $timedebutminute == $timefinminute)
        {
            return back()->with('message', 'Heure de début est identique à heure de fin.');
        }
        else
        {
            $resultat =  DB::table('etats')
            ->where('etats.id','=',1)
            ->update(['etats.etat' => 0,'etats.timedebut' => $timedebut,'etats.timefin' => $timefin]);

        }
        
    } */
}
