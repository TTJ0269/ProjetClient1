@extends('layouts.app', ['activePage' => 'region', 'titlePage' => __('Nouvelle Région')])

@section('content')

<div class="content"> 
    <form action="{{ route('regions.store') }}" method="POST" enctype="multipart/form-data">
    @include('Region.form')
        <button type="submit" class="btn btn-primary my-3">Ajouter une nouvelle région</button>
    </form>
</div>

@endsection