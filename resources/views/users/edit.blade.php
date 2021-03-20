@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('')])

@section('content')

<h1>Modifier le profil : {{ $user->nom }}</h1>
<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @include('users.form')
    <button type="submit" class="btn btn-primary my-3">Sauvegarder les informations</button>
</form>

@endsection