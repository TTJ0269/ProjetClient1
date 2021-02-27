@extends('layouts.app', ['activePage' => 'candidats', 'titlePage' => __('Nouveau Candidat')])

@section('content')

<div class="content">
    <form action="{{ route('candidats.store') }}" method="POST" enctype="multipart/form-data">
    @include('Candidat.form')
        <button type="submit" class="btn btn-primary my-3">Ajouter un candidat</button>
    </form>
</div>

@endsection