@extends('layouts.app', ['activePage' => 'candidats', 'titlePage' => __('')])

@section('content')

<h1>Modifier le profil : {{ $candidat->nomcd }}</h1>
<form action="{{ route('candidats.update', ['candidat' => $candidat->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('Candidat.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection