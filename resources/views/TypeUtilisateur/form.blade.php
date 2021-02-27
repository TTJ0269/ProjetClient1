@csrf
<div class="container-fluid">
  <div class="card">
     <div class="card-header card-header-primary">
        <h4 class="card-title">Type Utilisateur</h4>
        <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
      </div>
         <div class="card-body">
            <div id="typography">
                  <div class="card-title">
                     <h2>Type Utilisateur</h2>
                  </div>
               <div class="content">
                  <div class="form-group my-3">
                     <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Rentrez un type..." value="{{ old('nom') ?? $type_utilisateur->nom }}">
                     @error('nom')
                        <div class="invalid-feedback">
                           {{ $errors->first('nom')}}
                        </div>   
                     @enderror
                  </div>
               </div>
            </div>
       </div>
   </div>
</div>


