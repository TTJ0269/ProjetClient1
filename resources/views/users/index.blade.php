@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Utilisateur')])

@section('content')

<div class="content">
    <a href="{{ route('users.create') }}" class="btn btn-primary my-3">Nouveau Utilisateur</a>

    <ul>
    <div class="container-fluid">
                          @if (session()->has('message'))
                          <div class="alert alert-success" role="alert">
                          {{ session()->get('message') }}
                          </div>
                          @endif
                          @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Utilisateur</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
           <div class="card-body">     

                <table class="table">
                <thead>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type Utilisateur</th>
                    <th scope="col">Région</th>
                </thead>

                <tbody>
                @foreach($users as $user)
                <tr>
                <th scope="row"> {{$user->id}} </th>
                <th scope="row"> {{$user->nom}} </th>
                <th scope="row"> {{$user->prenom}} </th>
                <td> <a href="{{ route('users.show', ['user' => $user->id]) }}"> {{$user->email}} </a></td>
                <th scope="row"> {{$user->type_utilisateur->nom}} </th>
                <th scope="row"> {{$user->region->nom}} </th>
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
