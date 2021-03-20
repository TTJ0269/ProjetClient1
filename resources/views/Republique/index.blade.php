@extends('layouts.app', ['activePage' => 'republique', 'titlePage' => __('Republique')])

@section('content')
<div class="content">
    <a href="{{ route('republiques.create') }}" class="btn btn-primary my-3">Nouvelle Republique</a>

 <ul>
 <div class="container-fluid">
       <div class="card">
                          @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
          <div class="card-header card-header-primary">  
            <h4 class="card-title">République</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
           <div class="card-body">

                <table class="table">
                <thead>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom</th>
                </thead>

                <tbody>
                @foreach($republiques as $republique)
                <tr>
                <th scope="row"> {{$republique->id}} </th>
                <td> <a href="{{ route('republiques.show', ['republique' => $republique->id]) }}"> {{$republique->nomrep}} </a></td>
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