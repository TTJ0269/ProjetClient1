<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Republique;

class RegionController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // Afficher les republiques
   public function index()
   {
   $regions = Region::all();
   $republiques = Republique::all();

   return view('Region.index', compact('regions', 'republiques'));
   }

     /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function create()
   {
       $region = new Region();
       $republiques = Republique::all();

       return view('Region.create',compact('region', 'republiques'));
   }

     /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store()
   {   
       $regions = Region::create($this->validator());

       return redirect('regions')->with('message', 'Région bien ajoutée.');
   }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show(Region $region)
   {
     return view('Region.show',compact('region'));
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(Region $region)
   {
       $republiques = Republique::all();
       return view('Region.edit', compact('region', 'republiques'));
   }

      /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function update(Region $region)
   {
      $region->update($this->validator());

       return redirect('regions/' . $region->id);
   }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(Region $region)
   {
    $region->delete();

       return redirect('regions');
   }

   private  function validator()
   {
       return request()->validate([
           'nom'=>'required',
           'republique_id'=>'required|integer',
       ]); 
   } 
}
