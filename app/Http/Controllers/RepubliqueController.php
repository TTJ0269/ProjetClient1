<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Republique;

class RepubliqueController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // Afficher les republiques
   public function index()
   {
   $republiques = Republique::all();

   return view('Republique.index', compact('republiques'));
   }

     /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function create()
   {
       $republique = new Republique();

       return view('Republique.create',compact('republique'));
   }

     /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store()
   {   
       $republique = Republique::create($this->validator());

       return redirect('republiques')->with('message', 'République bien ajouté.');
   }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show(Republique $republique)
   {
   // $republique = Republique::where('idrep',$republique)->firstOrfail();
     return view('Republique.show',compact('republique'));
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(Republique $republique)
   {
   // $republique = Republique::where('idrep',$republique)->firstOrfail();
       return view('Republique.edit', compact('republique'));
   }

      /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function update(Republique $republique)
   {
    //$republique->update('idrep',$republique)->firstOrfail();
     // dd($republique);
      $republique->update($this->validator());

       return redirect('republiques/' . $republique->id);
   }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(Republique $republique)
   {
    $republique->delete();

       return redirect('republiques');
   }

   private  function validator()
   {
       return request()->validate([
           'nomrep'=>'required|min:3'
       ]); 
   } 
}
