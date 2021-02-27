@extends('layouts.app', ['activePage' => 'vote', 'titlePage' => __('Vote')])

@section('content')
<div class="content">
        <h1 align="center"><strong>REPUBLIQUE TOGOLAISE</strong></h1>
        <hr>
 
  <ul>
    <div class="container-fluid">
          <div class="card">
                         @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
              <div class="card-header card-header-primary">  
                <h4 class="card-title">Voter en toute sécurité</h4>
                <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
              </div>
        
               <div class="card-body">
                  @foreach($candidats as $candidat)
                    <form action="{{ route('votes_store') }}" method="POST" class="section">
                      @csrf
                      <p><strong>Nom du candidat :</strong> {{$candidat->nomcd}}</p>
                    <input type="number" hidden  name="candidat_id" value="{{$candidat->id}}" >
                            @if($candidat->imagecd)
                              <img src="{{ asset('storage/' .$candidat->imagecd) }}" alt="candidat-ImageCandidat" class="img-thumbnail" width="400">
                            @endif
                        <div class="field">
                          <div class="control">
                          <!--onClick="store()"--> <button type="submit" class="btn btn-primary my-3">Voter</button>
                          </div>
                        </div>
                  </form>
                  @endforeach
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
