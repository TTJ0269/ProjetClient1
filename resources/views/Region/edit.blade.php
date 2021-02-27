@extends('layouts.app', ['activePage' => 'region', 'titlePage' => __('')])

@section('content')

<h1>Modifier la région : {{ $region->nom }}</h1> 
<form action="{{ route('regions.update', ['region' => $region->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('Region.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection