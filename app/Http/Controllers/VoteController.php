<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use App\Models\Vote;
use App\Models\User;
use App\Models\Etat;
use App\Models\Candidat;

class VoteController extends Controller
{
    public function form()
    {
      try
      {
        $votes = Vote::all();
        $users = User::all();
        $candidats = Candidat::all();
        $type_id=(Auth::user()->type_utilisateur_id);


          $etatvote = DB::table('etats')
          ->select(['etats.etat'])
          ->where('etats.id','=',1)
          ->first();

          if($etatvote->etat==0)
          {
            return view('Vote.formvotefermer');
          }
          elseif($type_id==1 || $type_id==2) /** verifier si c'est un assesseur ou admin **/
          {
            return redirect('users')->with('message', 'Vous ne pouvez pas accéder à cette page de vote.');
          }
          elseif($etatvote->etat==1)
          {
            return view('Vote.form',compact('votes','candidats','users'));
          }
      }
      catch(\Exception $exception)
      {
          // return $exception->getMessage();
          return view('Erreurs.erreurelecteur');
      }

    }
    

 
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store()
    {  
      try
      {
        //liste=id est l'identifiant de l'electeur qui a été recuperé de le formulaire Vote.form et envoyer dans le controlleur VoteController a la fonction store(). 
  
        $etat=(Auth::user()->etat);
        $utilisateur_id=(Auth::user()->id);
        $etatvote = DB::table('etats')
        ->select(['etats.etat'])
        ->where('etats.id','=',1)
        ->first();

     /** verifier si la periode de vote est fermé **/
        if($etatvote->etat==0)
        {
          return view('Vote.formvotefermer');
        } 
        elseif($etat==1)
        {
          //return redirect('users')->with('message', 'Utilisateur bien ajouté.');
          //return back()->withStatus(__('message', 'Utilisateur bien ajouté.'));
          return back()->with('messagealert', 'Vous avez déjà voté.');
        }
        elseif($etatvote->etat==1)
        {

          /****** actualiser  *******/
          $user = DB::table('users')
          ->where('users.id','=',$utilisateur_id)
          ->update(['users.etat' => 1]);

          $votes = Vote::create([
            'utilisateur_id'=> $utilisateur_id,
            'candidat_id'=> request('candidat_id'),
          ]);
          
          //$votes = Vote::create($this->validator());
          
          return redirect('/home')->with('message', 'Votre vote a été validé avec succes.');
        }
      }
      catch(\Exception $exception)
      {
          // return $exception->getMessage();
          return view('Erreurs.erreurelecteur');
      }
         
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function show()
    {
      try
      {
        $candidats = Candidat::all();
        return view('Vote.show',compact('vote'));
      }
      catch(\Exception $exception)
      {
          // return $exception->getMessage();
          return view('Erreurs.erreurelecteur');
      }
    }
 
    private  function validator()
    {
        return request()->validate([
            'utilisateur_id'=>'required',
            'candidat_id'=>'required',
        ]); 
    }
}
