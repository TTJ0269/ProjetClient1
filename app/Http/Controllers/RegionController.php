<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\Republique;

class RegionController extends Controller
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
        return redirect('erreur')->with('messagealert',$exception->getMessage());
    }
  }

  
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // Afficher les republiques
   public function index()
   {
     try
     {
        $regions = Region::all();
        $republiques = Republique::all();

        return view('Region.index', compact('regions', 'republiques'));
     }
    catch(\Exception $exception)
     {
        // return $exception->getMessage();
        return redirect('erreur')->with('messagealert',$exception->getMessage());
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
       $region = new Region();
       $republiques = Republique::all();

       return view('Region.create',compact('region', 'republiques'));
     }
    catch(\Exception $exception)
    {
          // return $exception->getMessage();
          return redirect('erreur')->with('messagealert',$exception->getMessage());
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
       $regions = Region::create($this->validator());

       return redirect('regions')->with('message', 'Région bien ajoutée.');
     }
      catch(\Exception $exception)
      {
            // return $exception->getMessage();
            return redirect('erreur')->with('messagealert',$exception->getMessage());
      }
   }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show(Region $region)
   {
     try
     {
       return view('Region.show',compact('region'));
     }
     catch(\Exception $exception)
     {
          // return $exception->getMessage();
          return redirect('erreur')->with('messagealert',$exception->getMessage());
     }
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(Region $region)
   {
     try
     {
       $republiques = Republique::all();
       return view('Region.edit', compact('region', 'republiques'));
     }
      catch(\Exception $exception)
      {
            // return $exception->getMessage();
            return redirect('erreur')->with('messagealert',$exception->getMessage());
      }
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
     try
     {
      $region->update($this->validator());

       return redirect('regions/' . $region->id);
     }
      catch(\Exception $exception)
      {
            // return $exception->getMessage();
            return redirect('erreur')->with('messagealert',$exception->getMessage());
      }
   }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(Region $region)
   {
     try
     {
        $reference = DB::table('users')
        ->where('users.region_id','=',$region->id)
        ->select('users.id')
        ->first();

        if($reference->id == null)
        {
          $region->delete();

          return redirect('regions');
        }
         return redirect('regions')->with('messagealert','Cette région est referencée dans une autre table');

     }
      catch(\Exception $exception)
      {
            // return $exception->getMessage();
            return redirect('erreur')->with('messagealert',$exception->getMessage());
      }
   }

   private  function validator()
   {
       return request()->validate([
           'nom'=>'required',
           'republique_id'=>'required|integer',
       ]); 
   } 
}
