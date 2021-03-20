@extends('layouts.app', ['activePage' => 'region', 'titlePage' => __('Région')])

@section('content')
<div class="content">
    <a href="{{ route('regions.create') }}" class="btn btn-primary my-3">Nouvelle région</a>

    <ul>
    <div class="container-fluid">
       <div class="card">
                          @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Région</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
           <div class="card-body">

                <table class="table">
                <thead>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">République</th>
                </thead>

                <tbody>
                @foreach($regions as $region)
                <tr>
                <th scope="row"> {{$region->id}} </th>
                <td> <a href="{{ route('regions.show', ['region' => $region->id]) }}"> {{$region->nom}} </a></td>
                <th scope="row"> {{$region->republique->nomrep}} </th>
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