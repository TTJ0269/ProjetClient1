@csrf
<div class="container-fluid">
                          @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
  <div class="card">
     <div class="card-header card-header-primary">
        <h4 class="card-title">Infromations des Utilisateurs</h4>
        <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
      </div>
         <div class="card-body">
            <div id="typography">
                  <div class="card-title">
                     <h2>Utilisateur</h2>
                  </div>
               <div class="content">
                     
                   <div class="form-group my-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Rentrez le name de l'utilisateur..." value="{{ old('name') ?? $user->name }}" autofocus  required/>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $errors->first('name')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Rentrez le nom de l'utilisateur..." value="{{ old('nom') ?? $user->nom }}" autofocus  required/>
                    @error('nom')
                        <div class="invalid-feedback">
                            {{ $errors->first('nom')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Rentrez le prenom de l'utilisateur..." value="{{ old('prenom') ?? $user->prenom }}" autofocus  required/>
                    @error('prenom')
                        <div class="invalid-feedback">
                            {{ $errors->first('prenom')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('nompere') is-invalid @enderror" name="nompere" placeholder="Rentrez le nom du pére de l'utilisateur..." value="{{ old('nompere') ?? $user->nompere }}">
                    @error('nompere')
                        <div class="invalid-feedback">
                            {{ $errors->first('nompere')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('nommere') is-invalid @enderror" name="nommere" placeholder="Rentrez le nom de la mére de l'utilisateur..." value="{{ old('nommere') ?? $user->nommere }}">
                    @error('nommere')
                        <div class="invalid-feedback">
                            {{ $errors->first('nommere')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" placeholder="Rentrez la profession de l'utilisateur..." value="{{ old('profession') ?? $user->profession }}" autofocus  required/>
                    @error('profession')
                        <div class="invalid-feedback">
                            {{ $errors->first('profession')}}
                        </div>
                    @enderror
                    </div>

                    <div class="form-control" >
                    <input type="radio" name="sexe" id="Masculin" placeholder="Masculin" autofocus />
                    <label for="Masculin">M</label>
                    <input type="radio"  name="sexe" id="Feminin" placeholder="Feminin" autofocus />
                    <label for="Feminin">F</label>
                    @error('sexe')
                        <div class="invalid-feedback">
                            {{ $errors->first('sexe')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="date" class="form-control @error('datenaissance') is-invalid @enderror" name="datenaissance" placeholder="Rentrez la date de naissance de l'utilisateur..." value="{{ old('datenaissance') ?? $user->datenaissance }}" autofocus  required/>
                    @error('datenaissance')
                        <div class="invalid-feedback">
                            {{ $errors->first('datenaissance')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="Rentrez l'adresse de l'utilisateur..." value="{{ old('adresse') ?? $user->adresse }}" autofocus  required/>
                    @error('adresse')
                        <div class="invalid-feedback">
                            {{ $errors->first('adresse')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile" value="{{ old('image') ?? $user->image }}">
                            <label class="custom-file-label" for="validatedCustomFile"> Choisir une image...</label>
                            @error('image')
                        <div class="invalid-feedback">
                            {{ $errors->first('image')}}
                        </div>   
                        @enderror
                        </div>
                    </div>
                    
                    <div class="form-group my-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Rentrez email de l'utilisateur..." value="{{ old('email') ?? $user->email }}" autofocus  required/>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $errors->first('email')}}
                        </div>   
                    @enderror
                    </div>

                    <!--div class="form-group my-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Rentrez le mot de passe de l'utilisateur..." value="{{ old('password') ?? $user->password }}" autofocus  required/>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $errors->first('password')}}
                        </div>   
                    @enderror
                    </div-->

                    <div class="form-group my-3">
                    <select class="custom-select @error('type_utilisateur_id') is-invalid @enderror" name="type_utilisateur_id">
                            @foreach($type_utilisateurs as $type_utilisateur)
                        <option value="{{ $type_utilisateur->id}}" {{ $user->type_utilisateur_id = $type_utilisateur->id ? 'selected' : ''}}> {{ $type_utilisateur->nom }} </option>
                        @endforeach
                    </select>
                    @error('type_utilisateur_id')
                        <div class="invalid-feedback">
                            {{ $errors->first('type_utilisateur_id')}}
                        </div>   
                    @enderror
                    </div>

                    <div class="form-group my-3">
                    <select class="custom-select @error('region_id') is-invalid @enderror" name="region_id">
                            @foreach($regions as $region)
                        <option value="{{ $region->id}}" {{ $region->region_id = $region->id ? 'selected' : ''}}> {{ $region->nom }} </option>
                        @endforeach
                    </select>
                    @error('region_id')
                        <div class="invalid-feedback">
                            {{ $errors->first('region_id')}}
                        </div>   
                    @enderror
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>