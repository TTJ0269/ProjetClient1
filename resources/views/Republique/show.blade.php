@extends('layouts.app', ['activePage' => 'republique', 'titlePage' => __('Republique')])

@section('content')
<div class="content">
    <h2>{{$republique->nomrep}}</h2>
    <div class="container-fluid">
       <div class="card">
          <div class="card-header card-header-primary">  
            <h4 class="card-title">Informations de la république</h4>
             <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
          </div>
     
            <div class="card-body">  
                <a href="{{ route('republiques.edit', ['republique' => $republique->id]) }}" class="btn btn-yellow my-3">Modifier</a>
                <form action="{{ route('republiques.destroy', ['republique' => $republique->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <hr>
                <p><strong>Nom :</strong> {{$republique->nomrep}}</p>
             </div>
       </div>
   </div>
</div>
@endsection