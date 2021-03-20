<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Candidat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        try
        {
          $this->middleware('auth');
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      try
      {
        // return view('dashboard');
        /**** $candidats recupere tous les candidats et les envoies sur la page Vote.form ****/
        $candidats = Candidat::all();

        $type_id=(Auth::user()->type_utilisateur_id);


        $etatvote = DB::table('etats')
        ->select(['etats.etat'])
        ->where('etats.id','=',1)
        ->first();
        
        if($etatvote->etat==0 && $type_id==3)
        {
          return view('Vote.formvotefermer');
        }
      
        elseif($type_id==1 || $type_id==2)
        {
          return redirect('users');
        }

          return view('Vote.form',compact('candidats'));
      }
      catch(\Exception $exception)
      {
          // return $exception->getMessage();
          return view('Erreurs.erreur');
      }
      
    }

}
