<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\TypeUtilisateur;
use App\Models\Region;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    /**public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }*/

    public function index()
   {
   $users = User::all();
   $type_utilisateurs = TypeUtilisateur::all();
   $regions = Region::all();

   return view('users.index', compact('users', 'type_utilisateurs','regions'));
   }

      /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function create()
   {
       $user = new User();
       $type_utilisateurs = TypeUtilisateur::all();
       $regions = Region::all();

       return view('users.create',compact('user', 'type_utilisateurs','regions'));
   }

     /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store()
   {   
       $users = User::create([
        'name'=> request('name'),
        'nom'=> request('nom'),
        'prenom'=> request('prenom'),
        'nompere'=> request('nompere'),
        'nommere'=> request('nommere'),
        'profession'=> request('profession'),
        'datenaissance'=> request('datenaissance'),
        'adresse'=> request('adresse'),
        'password'=> Hash::make(request('password')),
        'email'=> request('email'),
        'type_utilisateur_id'=> request('type_utilisateur_id'),
        'region_id'=> request('region_id'),
        'sexe'=> request('sexe'),
        'image'=> request('image'),
       ]);
       $this->storeImage($users);

       return redirect('users')->with('message', 'Utilisateur bien ajouté.');
   }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show(User $user)
   {
     return view('users.show',compact('user'));
   }

  /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit(User $user)
   {
       $type_utilisateurs = TypeUtilisateur::all();
       $regions = Region::all();
       return view('users.edit', compact('user', 'type_utilisateurs','regions'));
   }

      /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function update(User $user)
   {
      $user->update([
        'name'=> request('name'),
        'nom'=> request('nom'),
        'prenom'=> request('prenom'),
        'nompere'=> request('nompere'),
        'nommere'=> request('nommere'),
        'profession'=> request('profession'),
        'datenaissance'=> request('datenaissance'),
        'adresse'=> request('adresse'),
        'password'=> Hash::make(request('password')),
        'email'=> request('email'),
        'type_utilisateur_id'=> request('type_utilisateur_id'),
        'region_id'=> request('region_id'),
        'sexe'=> request('sexe'),
        'image'=> request('image'),
      ]);

      $this->storeImage($user);

       return redirect('users/' . $user->id);
   }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function destroy(User $user)
   {
    $user->delete();

       return redirect('users');
   }

   private  function validator()
   {
       return request()->validate([
           'name'=>'required',
           'nom'=>'required',
           'prenom'=>'required',
           'nompere'=>'required',
           'nommere'=>'required',
           'profession'=>'required',
           'datenaissance'=>'required|date',
           'adresse'=>'required',
           'password'=>'required|min:8',
           'email'=>'required|min:8',
           'type_utilisateur_id'=>'required|integer',
           'region_id'=>'required|integer',
           'sexe'=>'required',
           'image'=>'sometimes|image|max:5000'
       ]); 
   }

   private function storeImage(User $user)
   {
        if(request('image'))
        {
            $user->update([
             'image'=> request('image')->store('ImageUtilisateur','public'),
            ]);       
        }
   }
}
