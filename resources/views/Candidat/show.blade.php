@extends('layouts.app', ['activePage' => 'candidats', 'titlePage' => __('Nouveau Candidat')])

@section('content')

<div class="content">
            <h1> {{$candidat->nomcd}} </h1>
   <div class="container-fluid">
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Informations du candidat</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
            <div class="card-body">  
              <a href="{{ route('candidats.edit', ['candidat' => $candidat->id]) }}" class="btn btn-info my-3">Modifier</a>
              <form action="{{ route('candidats.destroy', ['candidat' => $candidat->id]) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
              <hr>
              <p><strong>Nom du candidat:</strong> {{$candidat->nomcd}}</p>
              <p><strong>Prenom du candidat :</strong> {{$candidat->prenomcd}}</p>
              @if($candidat->imagecd)
              <img src="{{ asset('storage/' .$candidat->imagecd) }}" alt="candidat-ImageCandidat" class="img-thumbnail" width="400">
              @endif
              <p><strong>Nom du parti politique :</strong> {{$candidat->nomparti}}</p>
              @if($candidat->pancarteparti)
              <img src="{{ asset('storage/' .$candidat->pancarteparti) }}" alt="candidat-ImagePancarte" class="img-thumbnail" width="400">
              @endif
            </div>
      </div>
  </div>
</div>
@endsection