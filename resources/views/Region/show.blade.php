@extends('layouts.app', ['activePage' => 'region', 'titlePage' => __('Nouvelle Région')])

@section('content')
<div class="content">
            <h1> {{$region->nom}} </h1>
   <div class="container-fluid">
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Informations de la région</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
            <div class="card-body">  
                <a href="{{ route('regions.edit', ['region' => $region->id]) }}" class="btn btn-yellow my-3">Modifier</a>
                <form action="{{ route('regions.destroy', ['region' => $region->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <hr>
                <p><strong>Nom :</strong> {{$region->nom}}</p>
            </div>
       </div>
  </div>
</div>
@endsection