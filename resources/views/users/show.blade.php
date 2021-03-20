@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Utilisateur')])

@section('content')
<div class="content">
   <h1> {{$user->email}} </h1>
    <div class="container-fluid">
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Informations de l'utilisateur</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
           <div class="card-body">    

                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-yellow my-3">Modifier</a>
                
                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <hr>
                <p><strong>Nom :</strong> {{$user->nom}}</p>
                <p><strong>Prenom :</strong> {{$user->prenom}}</p>
                <p><strong>Date de naissance :</strong> {{$user->datenaissance}}</p>
                <p><strong>Nom du pére :</strong> {{$user->nompere}}</p>
                <p><strong>Nom de la mère :</strong> {{$user->nommere}}</p>
                <p><strong>Profession :</strong> {{$user->profession}}</p>
                <p><strong>Email :</strong> {{$user->email}}</p>
                @if($user->image)
                <img src="{{ asset('storage/' .$user->image) }}" alt="user-ImageUtilisateur" class="img-thumbnail" width="400">
                @endif
         </div>
     </div>
  </div>
</div>
@endsection