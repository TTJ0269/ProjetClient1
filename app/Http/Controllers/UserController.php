<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Events\UserHasRegisteredEvent;
use App\Models\User;
use App\Models\TypeUtilisateur;
use App\Models\Region;

class UserController extends Controller
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
       try
       {
        $users = User::all();
        $type_utilisateurs = TypeUtilisateur::all();
        $regions = Region::all();

        return view('users.index', compact('users', 'type_utilisateurs','regions'));
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
        $user = new User();
        $type_utilisateurs = TypeUtilisateur::all();
        $regions = Region::all();

        return view('users.create',compact('user', 'type_utilisateurs','regions'));
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
           
            $date = now()->format('Y');  /** récuperation de l'année en cours **/
            $dateutilisateur = Date::make(request('datenaissance'))->format('Y');   /** conversion de l'année récuperée **/
            $agedevote = $date -18;  /** Vérification da l'age pour voir si le concerné a l'age de voter **/
            $agelimite= $date -90; /*** Si l'on à plus de 90 ans il ou elle ne votera plus cela pour eviter de choisir l'an 200 par exemple  ***/
            $registrementtype= request('type_utilisateur_id'); /** id du type de personne à enrégistrer **/
            $type_id=(Auth::user()->type_utilisateur_id); /** id du type de personne connectée **/

          /** generation du mot de passe**/
            $pawd=30062000;
            $dateannee = now()->format('Y');
            $datemois = now()->format('m');
            $datejour = now()->format('d');
            $dateheure = now()->format('h');
            $dateminuit = now()->format('i');
            $dateseconde = now()->format('s');
            $a= ($pawd + $dateannee + $datemois + $datejour + $dateheure + $dateminuit + $dateseconde); 

          /** fin de generation du mot de passe **/

            /**** Si l'utilisateur a 18 ans au plus alors l'on peut l'entrégistrer****/
            if($dateutilisateur > $agedevote)
            {
                return back()->with('messagealert','Désolé l"utilisateur doit avoir 18 ans ou plus');
            }
            elseif( $agelimite >= $dateutilisateur)
            {
                return back()->with('messagealert','Désolé l"utilisateur a plus de 150 ans');
            }
            elseif($type_id==2 && ($registrementtype==1 || $registrementtype==2))
                {
                return back()->with('messagealert','Désolé pas de droit nécessaire pour enregistrer un Admin ou un Assesseur');
                }
            else
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
                        'password'=> Hash::make($a),
                        'email'=> request('email'),
                        'type_utilisateur_id'=> request('type_utilisateur_id'),
                        'region_id'=> request('region_id'),
                        'sexe'=> request('sexe'),
                        'image'=> request('image'),
                        ]);
                        $this->storeImage($users);

                        event(new UserHasRegisteredEvent($users));
                
                        return redirect('users')->with('message', 'Utilisateur bien ajouté.');

                }
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

   public function show(User $user)
   {  
       try
       {   
            $a= $user->id; //recuperer id utilisateur
            $id_type = (Auth::user()->type_utilisateur_id); //recuperer id type_utilisateur
            $typevoir = DB::table('users')
            ->select(['users.type_utilisateur_id'])
            ->where('users.id','=',$a)
            ->first();

            if($typevoir->type_utilisateur_id==1 && $id_type==2)
            {
                return redirect('users')->with('message', 'Pas de droit néccessaire pour voir ces informations.');
            }
            return view('users.show',compact('user'));
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

   public function edit(User $user)
   {
       try
       {
        $type_utilisateurs = TypeUtilisateur::all();
        $regions = Region::all();
        return view('users.edit', compact('user', 'type_utilisateurs','regions'));
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

   public function update(User $user)
   {
       try
       {
            $date = now()->format('Y');  /** récuperation de l'année en cours **/
            $dateutilisateur = Date::make(request('datenaissance'))->format('Y');   /** conversion de l'année récuperée **/
            $agedevote = $date -18;  /** Vérification da l'age pour voir si le concerné a l'age de voter **/
            $agelimite= $date -150; /*** Si l'on à plus de 90 ans il ou elle ne votera plus cela pour eviter de choisir l'an 200 par exemple  ***/
            $registrementtype= request('type_utilisateur_id'); /** id du type de personne à enrégistrer **/
            $type_id=(Auth::user()->type_utilisateur_id); /** id du type de personne connectée **/

            /**** Si l'utilisateur a 18 ans au plus alors l'on peut l'entrégistrer****/
            if($dateutilisateur > $agedevote)
            {
                return back()->with('messagealert','Désolé d"utilisateur doit avoir 18 ans ou plus');
            }
            elseif( $agelimite >= $dateutilisateur)
            {
                return back()->with('messagealert','Désolé d"utilisateur a plus de 150 ans');
            }
            elseif($type_id==2 && ($registrementtype==1 || $registrementtype==2))
            {
                return back()->with('messagealert','Désolé pas de droit nécessaire pour enregistrer un Admin ou un Assesseur');
            }
            else
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
                            'email'=> request('email'),
                            'type_utilisateur_id'=> request('type_utilisateur_id'),
                            'region_id'=> request('region_id'),
                            'sexe'=> request('sexe'),
                            'image'=> request('image'),
                        ]);

                        $this->storeImage($user);

                        return redirect('users/' . $user->id);
                }
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

   public function destroy(User $user)
   {
    try
    {
        $reference = DB::table('votes')
            ->where('votes.utilisateur_id','=',$user->id)
            ->select('votes.id')
            ->first();
     
            if($reference->id == null)
            {
                $user->delete();

                return redirect('users');
            }
           return redirect('users')->with('messagealert','Cet utilisateur est referencé dans une autre table');
  
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
