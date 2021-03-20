@extends('layouts.appelecteur', ['activePage' => 'vote', 'titlePage' => __('Vote')])

@section('content')
<div class="content"> 
     <table class="table"> 
                <tbody >
                   <tr>
                      <th scope="row" > <img src="{{ asset('material') }}/img/armoiries.jpg" alt="" class="img-thumbnail" width="100"> </th>
                      <th scope="row"> <h1 align="center"><strong>ELECTION PRESIDENTIELLE</strong></h1> </th>
                      <th scope="row"> <img src="{{ asset('material') }}/img/ceni-logo.png" alt="" class="img-thumbnail" width="150"></th>
                   </tr>
                </tbody>
      </table>
  <hr>
  <ul>
    <div class="container-fluid">
        <div class="card">
                         @if (session()->has('messagealert'))
                            <div class="alert alert-danger" role="alert">
                            {{ session()->get('messagealert') }}
                            </div>
                         @endif
                         @if (session()->has('message'))
                           <div class="alert alert-success" role="alert">
                           {{ session()->get('message') }}
                           </div>
                         @endif



              <div class="card-header card-header-primary">  
                <h4 class="card-title">Voter en toute sécurité</h4>
                <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
              </div>
        
             <div class="card-body">
                   <table class="table"> 
                          <thead>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Image du candidat</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom parti</th>
                          </thead>

                       @foreach($candidats as $candidat)
                          <form action="{{ route('votes_store') }}" method="POST" class="section">
                            @csrf
                            <tbody >
                                <input type="number" hidden  name="candidat_id" value="{{$candidat->id}}" >
                              <tr>
                                <th scope="row" > {{$candidat->id}} </th>
                                @if($candidat->imagecd)
                                <th scope="row"> <img src="{{ asset('storage/' .$candidat->imagecd) }}" alt="candidat-ImageCandidat" class="img-thumbnail" width="300"> </th>
                                @endif
                                <th scope="row" > {{$candidat->nomcd}} </th>
                                <th scope="row" > {{$candidat->prenomcd}} </th>
                                <th scope="row" > {{$candidat->nomparti}} </th>
                                <th scope="row"> <button type="submit" class="btn btn-primary my-3">Voter</button> </th>
                              </tr>
                            </tbody>
                          </form>   
                       @endforeach
                  </table>   
               </div>
      </div> 
   </div> 
  </ul>
</div>
<!--script>
function store()
{
  alert("Votre vote a été validé avec succes.");
}
</script-->
@endsection
