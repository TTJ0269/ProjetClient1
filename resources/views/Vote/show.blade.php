@extends('layouts.app', ['activePage' => 'vote', 'titlePage' => __('Vote')])

@section('content')
<div class="content">
        <h1 align="center"><strong>REPUBLIQUE TOGOLAISE</strong></h1>
        <hr>
 
  <ul>
    <div class="container-fluid">
          <div class="card">
              <div class="card-header card-header-primary">  
                <h4 class="card-title">Etats des partis politiques</h4>
              </div>
        
               <div class="card-body">
                  @foreach($candidats as $candidat)
                      @csrf
                      <p><strong>Nom du candidat :</strong> {{$candidat->nomcd}}</p>
                            @if($candidat->imagecd)
                              <img src="{{ asset('storage/' .$candidat->imagecd) }}" alt="candidat-ImageCandidat" class="img-thumbnail" width="400">
                            @endif
                  @endforeach
               </div>
            </div>
      </div> 
   </ul>
</div>