<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeUtilisateur;

class TypeUtilisateurController extends Controller
{
           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // Afficher les types utilisateurs
   public function index()
   {
   $type_utilisateurs = TypeUtilisateur::all();

   return view('TypeUtilisateur.index', compact('type_utilisateurs'));
   }

     /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function create()
   {
       $type_utilisateur = new TypeUtilisateur();

       return view('TypeUtilisateur.create',compact('type_utilisateur'));
   }

     /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store()
   {   
       $type_utilisateur = TypeUtilisateur::create($this->validator());

       return redirect('type_utilisateurs')->with('message', 'type bien ajouté.');
   }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show(TypeUtilisateur $type_utilisateur)
   {
     return view('TypeUtilisateur.show',compact('type_utilisateur'));
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(TypeUtilisateur $type_utilisateur)
   {
       return view('TypeUtilisateur.edit', compact('type_utilisateur'));
   }

      /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function update(TypeUtilisateur $type_utilisateur)
   {
      $type_utilisateur->update($this->validator());

       return redirect('type_utilisateurs/' . $type_utilisateur->id);
   }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(TypeUtilisateur $type_utilisateur)
   {
    $type_utilisateur->delete();

       return redirect('type_utilisateurs');
   }

   private  function validator()
   {
       return request()->validate([
           'nom'=>'required|min:3'
       ]); 
   } 
}
