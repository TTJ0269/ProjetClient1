@extends('layouts.app', ['activePage' => 'erreur', 'titlePage' => __('Erreur')])

@section('content')
<div class="content"> 
                      
    <!--  <table class="table"> 
                <tbody >
                   <tr>
                      <th scope="row" > <img src="{{ asset('material') }}/img/armoiries.jpg" alt="" class="img-thumbnail" width="100"> </th>
                      <th scope="row"> <h1 align="center"><strong>ELECTION PRESIDENTIELLE</strong></h1> </th>
                      <th scope="row"> <img src="{{ asset('material') }}/img/ceni-logo.png" alt="" class="img-thumbnail" width="150"></th>
                   </tr>
                </tbody> 
      </table> -->
  <hr>
  <ul>
    <div class="container-fluid">
                         @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
        <div class="card">
              <div class="card-header card-header-primary">  
                <h4 class="card-title">Erreur</h4>
                <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
              </div>
        
             <div class="card-body">
             <p>Désolé une erreur s'est produite.</p>
             <p>Veuillez contactez le service pour plus d’information et expliquer votre action.</p>
            </div>
      </div> 
   </div> 
  </ul>
</div>
@endsection