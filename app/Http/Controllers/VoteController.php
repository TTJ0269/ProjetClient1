<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;
use App\Models\User;
use App\Models\Candidat;

class VoteController extends Controller
{
    public function form()
    {
    $votes = Vote::all();
    $users = User::all();
    $candidats = Candidat::all();
 
    return view('Vote.form',compact('votes','candidats','users'));
    }
 
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store()
    {  
      //liste=id est l'identifiant de l'electeur qui a été recuperé de le formulaire Vote.form et envoyer dans le controlleur VoteController a la fonction store(). 
 
       $etat=(Auth::user()->etat);
       $utilisateur_id=(Auth::user()->id);

       if($etat==1)
       {
        //return redirect('users')->with('message', 'Utilisateur bien ajouté.');
        //return back()->withStatus(__('message', 'Utilisateur bien ajouté.'));
        return back()->with('messagealert', 'Vous avez déjà voté.');
       }
       else
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
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function show()
    {
      $candidats = Candidat::all();
      return view('Vote.show',compact('vote'));
    }
 
    private  function validator()
    {
        return request()->validate([
            'utilisateur_id'=>'required',
            'candidat_id'=>'required',
        ]); 
    }
}
