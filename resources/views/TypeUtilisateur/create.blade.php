@extends('layouts.app', ['activePage' => 'type_utilisateur', 'titlePage' => __(' Type Utilisateur')])

@section('content')
<div class="content">

            <form action="{{ route('type_utilisateurs.store') }}" method="POST" enctype="multipart/form-data">
            @include('TypeUtilisateur.form')
                <button type="submit" class="btn btn-primary my-3">Ajouter un type d'utilisateur</button>
            </form>     
</div>

@endsection