@extends('layouts.app', ['activePage' => 'type_utilisateur', 'titlePage' => __('Type Utilisateur')])

@section('content')
<div class="content">
    <h1> {{$type_utilisateur->nom}} </h1>
    <div class="container-fluid">
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Informations du type de l'utilisateur</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
            <div class="card-body">  
                <a href="{{ route('type_utilisateurs.edit', ['type_utilisateur' => $type_utilisateur->id]) }}" class="btn btn-yellow my-3">Modifier</a>
                <form action="{{ route('type_utilisateurs.destroy', ['type_utilisateur' => $type_utilisateur->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <hr>
                <p><strong>Nom :</strong> {{$type_utilisateur->nom}}</p>
           </div>
       </div>
  </div>
</div>
@endsection