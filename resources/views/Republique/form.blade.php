@csrf
<div class="container-fluid">
  <div class="card">
       <div class="card-header card-header-primary">
        <h4 class="card-title">Republique</h4>
        <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
        </div>
        <div class="card-body">
            <div id="typography">
                  <div class="card-title">
                     <h2>Republique</h2>
                  </div>
               <div class="content">
                    <div class="form-group">
                    <input type="text" class="form-control @error('nomrep') is-invalid @enderror" name="nomrep" placeholder="Rentrez un nom..." value="{{ old('nomrep') ?? $republique->nomrep }}">
                    @error('nomrep')
                        <div class="invalid-feedback">
                            {{ $errors->first('nomrep')}}
                        </div>   
                    @enderror
                    </div>
               </div>
            </div>
          </div>
   </div>
</div>