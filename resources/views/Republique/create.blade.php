@extends('layouts.app', ['activePage' => 'republique', 'titlePage' => __('Nouvelle République')])

@section('content')

<div class="content">
    <form action="{{ route('republiques.store') }}" method="POST" enctype="multipart/form-data">
    @include('Republique.form')
        <button type="submit" class="btn btn-primary my-3">Ajouter la République</button>
    </form>
</div>

@endsection