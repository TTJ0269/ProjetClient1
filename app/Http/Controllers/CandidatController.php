<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Candidat;

class CandidatController extends Controller
{

    public function __construct()
    {
        try
        {
          $this->middleware('auth');//->except(['index'])
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }
    
    public function index()
    {
        try
        {
            $candidats = Candidat::all();

            return view('Candidat.index', compact('candidats'));
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }

    public function create()
    {
        try
        {
            $candidat = new Candidat();
    
            return view('Candidat.create',compact('candidat'));
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }
 
 
    public function store()
    {   
        try
        {
            $candidats = Candidat::create($this->validator());
    
            $this->storeImage($candidats);

            $this->storePancarte($candidats);
    
            return redirect('candidats')->with('message', 'Candidat bien ajouté.');
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }
 

    public function show(Candidat $candidat)
    {
        try
        {
           return view('Candidat.show',compact('candidat'));
        }
        catch(\Exception $exception)
        {
           // return $exception->getMessage();
           return view('Erreurs.erreur');
        }
    }
 
 
    public function edit(Candidat $candidat)
    {
        try
        {
          return view('Candidat.edit', compact('candidat'));
        }
        catch(\Exception $exception)
        {
            // return $exception->getMessage();
            return view('Erreurs.erreur');
        }
    }


    public function update(Candidat $candidat)
    {
        try
        {

            $candidat->update($this->validator());
        
            $this->storeImage($candidat);

            $this->storePancarte($candidat);
        
                return redirect('candidats/' . $candidat->id);
        }
        catch(\Exception $exception)
        {
             // return $exception->getMessage();
             return view('Erreurs.erreur');
        }
    }
 
 
    public function destroy(Candidat $candidat)
    {
        try
        {

            $reference = DB::table('votes')
            ->where('votes.candidat_id','=',$candidat->id)
            ->select('votes.id')
            ->first();
     
            if($reference->id == null)
            {
                $candidat->delete();
    
                return redirect('candidats');
            }
           return redirect('candidats')->with('messagealert','Ce candidat est referencé dans une autre table');
    
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
            'nomcd'=>'required',
            'prenomcd'=>'required',
            'imagecd'=>'sometimes|image|max:5000',
            'nomparti'=>'required',
            'pancarteparti'=>'sometimes|image|max:5000'
        ]); 
    } 
 
    private function storeImage(Candidat $candidat)
    {
         if(request('imagecd'))
         {
             $candidat->update([
              'imagecd'=> request('imagecd')->store('ImageCandidat','public'),
             ]);       
         }
    }

    private function storePancarte(Candidat $candidat)
    {
         if(request('pancarteparti'))
         {
             $candidat->update([
              'pancarteparti'=> request('pancarteparti')->store('ImagePancarte','public'),
             ]);       
         }
    }
}
