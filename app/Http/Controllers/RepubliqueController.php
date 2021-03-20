<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Republique;

class RepubliqueController extends Controller
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
      $republiques = Republique::all();

      return view('Republique.index', compact('republiques'));
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
       $republique = new Republique();

       return view('Republique.create',compact('republique'));
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
       $republique = Republique::create($this->validator());

       return redirect('republiques')->with('message', 'République bien ajouté.');
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

   public function show(Republique $republique)
   {
     try
     {
      // $republique = Republique::where('idrep',$republique)->firstOrfail();
      return view('Republique.show',compact('republique'));
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

   public function edit(Republique $republique)
   {
     try
     {
       // $republique = Republique::where('idrep',$republique)->firstOrfail();
       return view('Republique.edit', compact('republique'));
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

   public function update(Republique $republique)
   {
     try
     {

        $republique->update($this->validator());

        return redirect('republiques/' . $republique->id);
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

   public function destroy(Republique $republique)
   {
     try
     {
       $reference = DB::table('regions')
       ->where('regions.republique_id','=',$republique->id)
       ->select('regions.id')
       ->first();

       if($reference->id == null)
       {
        $republique->delete();

        return redirect('republiques');
       }
      return redirect('republiques')->with('messagealert','Cette république est referencée dans une autre table');

     }
       catch(\Exception $exception)
       {
        return redirect('erreur')->with('messagealert',$exception->getMessage());
       }
   }

   private  function validator()
   {
       return request()->validate([
           'nomrep'=>'required|min:3'
       ]); 
   } 
}
