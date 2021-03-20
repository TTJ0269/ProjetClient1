@extends('layouts.app', ['activePage' => 'type_utilisateur', 'titlePage' => __('Type Utilisateur')])

@section('content')
<div class="content">
   <a href="{{ route('type_utilisateurs.create') }}" class="btn btn-primary my-3">Nouveau Type d'utilisateur</a>

   <ul>
   <div class="container-fluid">
       <div class="card">
                          @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Type Utilisateur</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
           <div class="card-body">
            <table class="table">
            <thead>
                  <th scope="col">Identifiant</th>
                  <th scope="col">Nom</th>
            </thead>

                  <tbody>
                  @foreach($type_utilisateurs as $type_utilisateur)
                  <tr>
                  <th scope="row"> {{$type_utilisateur->id}} </th>
                  <td> <a href="{{ route('type_utilisateurs.show', ['type_utilisateur' => $type_utilisateur->id]) }}"> {{$type_utilisateur->nom}} </a></td>
                  </tr>
                  @endforeach
                  </tbody>
            </table>
      </div>
   </div>
 </div> 
   </ul>
</div>

@endsection