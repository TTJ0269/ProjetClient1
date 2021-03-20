@extends('layouts.app', ['activePage' => 'candidats', 'titlePage' => __('Candidat')])

@section('content')
<div class="content">

<a href="{{ route('candidats.create') }}" class="btn btn-primary my-3">Nouveau candidat</a>

<ul>
<div class="container-fluid">
       <div class="card">
                          @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Candidat</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
           </div>
           
           <div class="card-body">

                <table class="table">
                <thead>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom du candidat</th>
                    <th scope="col">Prenom du candidat</th>
                    <th scope="col">Nom du parti politique</th>
                </thead>

                <tbody>
                @foreach($candidats as $candidat)
                <tr>
                <th scope="row"> {{$candidat->id}} </th>
                <td> <a href="{{ route('candidats.show', ['candidat' => $candidat->id]) }}"> {{$candidat->nomcd}} </a></td>
                <th scope="row"> {{$candidat->prenomcd}} </th>
                <th scope="row"> {{$candidat->nomparti}} </th>
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