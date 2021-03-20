@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Eléction')])

@section('content')
<div class="container" style="height: auto;">

                         @if (session()->has('message'))
                           <div class="alert alert-success" role="alert">
                           {{ session()->get('message') }}
                           </div>
                         @endif
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Bienvenue sur notre site de vote en ligne') }}</h1>
      </div>
  </div>
</div>
@endsection
