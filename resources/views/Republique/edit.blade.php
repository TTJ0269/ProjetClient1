@extends('layouts.app', ['activePage' => 'republique', 'titlePage' => __('')])

@section('content')

<h1>Modifier la république : {{ $republique->nomrep }}</h1>
<form action="{{ route('republiques.update', ['republique' => $republique->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('Republique.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection