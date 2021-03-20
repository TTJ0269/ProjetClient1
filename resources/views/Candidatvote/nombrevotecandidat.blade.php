@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'nbvoix', 'title' => __('Candidat')])

@section('content')

<div class="content">
    <ul>
    <table class="table"> 
                <tbody >
                   <tr>
                      <th scope="row" > <img src="{{ asset('material') }}/img/armoiries.jpg" alt="" class="img-thumbnail" width="100"> </th>
                      <th scope="row"> <h1 align="center"><strong>PUBLICATION DU RESULTAT DE VOTE</strong></h1> </th>
                      <th scope="row"> <img src="{{ asset('material') }}/img/ceni-logo.png" alt="" class="img-thumbnail" width="150"></th>
                   </tr>
                </tbody>
      </table>
    <hr>
    <div class="container-fluid">
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Voix par candidat</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
           <div class="card-body">     

                <table class="table">
                <thead>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Image du candidat</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom parti</th>
                    <th scope="col">Nombre de voix</th>
                    <th scope="col">Pourcentage de voix</th>
                </thead>

                <tbody>
                @foreach($nombre_voix as $voix)
                <tr>
                <th scope="row"> {{$voix->candidat_id}} </th>
                @if($voix->imagecd)
                <th scope="row"> <img src="{{ asset('storage/' .$voix->imagecd) }}" alt="candidat-ImageCandidat" class="img-thumbnail" width="150"> </th>
                @endif
                <th scope="row"> {{$voix->nomcd}} </th>
                <th scope="row"> {{$voix->prenomcd}} </th>
                <th scope="row"> {{$voix->nomparti}} </th>
                <th scope="row"> {{$voix->nombre}} </th>
                <th scope="row"> {{$voix->pourcentage}} % </th>
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
