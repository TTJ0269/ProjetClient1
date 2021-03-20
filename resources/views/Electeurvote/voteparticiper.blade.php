@extends('layouts.app', ['activePage' => 'participervote', 'titlePage' => __('Electeur-Vote')])

@section('content')
<div class="content">
   <ul>
          @foreach($nombre_voter as $nrb)
          <p><strong>Nombre:</strong>{{$nrb->nombre}}</p>
          @endforeach
   <div class="container-fluid">
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Informations des élécteurs qui ont participés au vote</h4>
          </div>
     
           <div class="card-body">
            <table class="table">
            <thead>
                  <th scope="col">Identifiant</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Nom du pére</th>
                  <th scope="col">Nom de la mére</th>
            </thead>

                  <tbody>
                  @foreach($utilisateurs_voter as $vote)
                  <tr>
                  <th scope="row"> {{$vote->id}} </th>
                  <th scope="row"> {{$vote->nom}} </th>
                  <th scope="row"> {{$vote->prenom}} </th>
                  <th scope="row"> {{$vote->nompere}} </th>
                  <th scope="row"> {{$vote->nommere}} </th>
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