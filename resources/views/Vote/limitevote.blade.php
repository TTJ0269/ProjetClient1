@extends('layouts.app', ['activePage' => 'votelimite', 'titlePage' => __('Limite-Vote')])

@section('content')

<div class="content"> 
      <table class="table">  
                <tbody >
                   <tr>
                      <th scope="row" > <img src="{{ asset('material') }}/img/armoiries.jpg" alt="" class="img-thumbnail" width="100"> </th>
                      <th scope="row"> <h1 align="center"><strong>ACTIVATION OU DESACTIVATION DES VOTES</strong></h1> </th>
                      <th scope="row"> <img src="{{ asset('material') }}/img/ceni-logo.png" alt="" class="img-thumbnail" width="150"></th>
                   </tr>
                </tbody>
      </table>
  <div class="container-fluid">
        <div class="card">
                         @if (session()->has('messagealert'))
                            <div class="alert alert-danger" role="alert">
                            {{ session()->get('messagealert') }}
                            </div>
                         @endif
                         @if (session()->has('message'))
                           <div class="alert alert-success" role="alert">
                           {{ session()->get('message') }}
                           </div>
                         @endif
            <div class="card-header card-header-primary">  
                <h4 class="card-title"> Vote</h4>
                <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
            </div>
<!-- <br>
            <h3 align="center"><u>Manuel</u></h3> -->

             <div class="card-body">
                 <table class="table"> 
                        @csrf
                            <tbody align="center">
                            <tr>
                                <form action="{{ route('voteactiver') }}" method="GET" class="section">   
                                <th scope="row"> <button type="submit" class="btn btn-success my-3">Activer Vote</button> </th>
                                </form>   
                                <form action="{{ route('votedesactiver') }}" method="GET" class="section">   
                                <th scope="row"> <button type="submit" class="btn btn-danger my-3">Désactiver Vote</button> </th>
                                </form> 
                            </tr>
                            </tbody>
                  </table>
              </div>
             <!--           <hr width="90%" align="center">
              <h3 align="center"><u>Automatique</u></h3>
              <div class="card-body">
                 <table class="table"> 
                            <tbody align="center">
                            <tr>  
                            <form action="{{ route('voteauto') }}" method="GET" class="section"> 
                                <th scope="row">Heure de début: <input type="time"  name="timedebut"> </th>
                                <th scope="row">Heure de fin: <input type="time"  name="timefin"> </th>
                                <th scope="row"><button type="submit" class="btn btn-success my-3">Valider</button></th>
                                </form>
                            </tr>
                            </tbody>
                  </table>
              </div> -->
      </div> 
   </div> 
</div>
@endsection