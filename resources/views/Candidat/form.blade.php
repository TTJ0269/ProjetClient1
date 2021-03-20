@csrf
<div class="container-fluid">
  <div class="card">
       <div class="card-header card-header-primary">
        <h4 class="card-title">Candidat</h4>
        <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
        </div>
        <div class="card-body">
            <div id="typography">
                  <div class="card-title">
                     <h2>Candidat</h2>
                  </div>
               <div class="content">
                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('nomcd') is-invalid @enderror" name="nomcd" placeholder="Rentrez le nom du candidat..." value="{{ old('nomcd') ?? $candidat->nomcd }}">
                    @error('nomcd')
                        <div class="invalid-feedback">
                            {{ $errors->first('nomcd')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('prenomcd') is-invalid @enderror" name="prenomcd" placeholder="Rentrez le prenom du candidat..." value="{{ old('prenomcd') ?? $candidat->prenomcd }}">
                    @error('prenomcd')
                        <div class="invalid-feedback">
                            {{ $errors->first('prenomcd')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                        <div class="custom-file">
                            <input type="file" name="imagecd" class="custom-file-input @error('imagecd') is-invalid @enderror" id="validatedCustomFile" value="{{ old('imagecd') ?? $candidat->imagecd }}">
                            <label class="custom-file-label" for="validatedCustomFile"> Choisir une image du candidat...</label>
                            @error('imagecd')
                        <div class="invalid-feedback">
                            {{ $errors->first('imagecd')}}
                        </div>   
                        @enderror
                        </div>
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('nomparti') is-invalid @enderror" name="nomparti" placeholder="Rentrez le nom du parti..." value="{{ old('nomparti') ?? $candidat->nomparti }}">
                    @error('nomparti')
                        <div class="invalid-feedback">
                            {{ $errors->first('nomparti')}}
                        </div>   
                    @enderror
                    </div>

                    <!--div class="form-group my-3">
                        <div class="custom-file">
                            <input type="file" name="pancarteparti" class="custom-file-input @error('pancarteparti') is-invalid @enderror" id="validatedCustomFile" value="{{ old('pancarteparti') ?? $candidat->pancarteparti }}">
                            <label class="custom-file-label" for="validatedCustomFile"> Choisir une image de la pancarte...</label>
                            @error('pancarteparti')
                            <div class="invalid-feedback">
                            {{ $errors->first('pancarteparti')}}
                            </div>   
                        @enderror
                        </div>
                    </div-->
                </div>
            </div>
         </div>
   </div>
</div>