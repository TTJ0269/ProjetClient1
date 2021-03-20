<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TypeUtilisateur;

class TypeUtilisateurController extends Controller
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
           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // Afficher les types utilisateurs
   public function index()
   {
     try
     {
        $type_utilisateurs = TypeUtilisateur::all();

        return view('TypeUtilisateur.index', compact('type_utilisateurs'));
     }
   catch(\Exception $exception)
     {
        // return $exception->getMessage();
        return view('Erreurs.erreur');
     }
   }

     /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function create()
   {
     try
     {
       $type_utilisateur = new TypeUtilisateur();

       return view('TypeUtilisateur.create',compact('type_utilisateur'));
     }
    catch(\Exception $exception)
    {
          // return $exception->getMessage();
          return view('Erreurs.erreur');
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
      $type_utilisateur = TypeUtilisateur::create($this->validator());

      return redirect('type_utilisateurs')->with('message', 'type bien ajouté.');
     }
     catch(\Exception $exception)
     {
          // return $exception->getMessage();
          return view('Erreurs.erreur');
     }

   }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show(TypeUtilisateur $type_utilisateur)
   {
     try
     {
       return view('TypeUtilisateur.show',compact('type_utilisateur'));
     }
     catch(\Exception $exception)
     {
          // return $exception->getMessage();
          return view('Erreurs.erreur');
     }
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(TypeUtilisateur $type_utilisateur)
   {
     try
     {
       return view('TypeUtilisateur.edit', compact('type_utilisateur'));
     }
    catch(\Exception $exception)
    {
        // return $exception->getMessage();
        return view('Erreurs.erreur');
    }
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
     try
     {
      $type_utilisateur->update($this->validator());

       return redirect('type_utilisateurs/' . $type_utilisateur->id);
     }
    catch(\Exception $exception)
    {
        // return $exception->getMessage();
        return view('Erreurs.erreur');
    }
   }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(TypeUtilisateur $type_utilisateur)
   {
     try
     {

      $reference = DB::table('users')
       ->where('users.type_utilisateur_id','=',$type_utilisateur->id)
       ->select('users.id')
       ->first();

       if($reference->id == null)
       {
        $type_utilisateur->delete();

        return redirect('type_utilisateurs');
       }
      return redirect('type_utilisateurs')->with('messagealert','Ce type est referencé dans une autre table');
      
     }
      catch(\Exception $exception)
      {
          // return $exception->getMessage();
          return view('Erreurs.erreur');
      }
   }

   private  function validator()
   {
       return request()->validate([
           'nom'=>'required|min:3'
       ]); 
   } 
}
