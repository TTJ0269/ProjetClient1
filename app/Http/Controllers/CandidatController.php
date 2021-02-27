<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;

class CandidatController extends Controller
{
    public function index()
    {
        $candidats = Candidat::all();

        return view('Candidat.index', compact('candidats'));
    }

    public function create()
    {
        $candidat = new Candidat();
 
        return view('Candidat.create',compact('candidat'));
    }
 
 
    public function store()
    {   
        $candidats = Candidat::create($this->validator());
 
        $this->storeImage($candidats);

        $this->storePancarte($candidats);
 
        return redirect('candidats')->with('message', 'Candidat bien ajouté.');
    }
 

    public function show(Candidat $candidat)
    {
      return view('Candidat.show',compact('candidat'));
    }
 
 
    public function edit(Candidat $candidat)
    {
        return view('Candidat.edit', compact('candidat'));
    }


    public function update(Candidat $candidat)
    {
       $candidat->update($this->validator());
 
       $this->storeImage($candidat);

       $this->storePancarte($candidat);
 
        return redirect('candidats/' . $candidat->id);
    }
 
 
    public function destroy(Candidat $candidat)
    {
     $candidat->delete();
 
        return redirect('candidats');
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
