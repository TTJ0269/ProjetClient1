@csrf
<div class="container-fluid">
  <div class="card">
       <div class="card-header card-header-primary">
        <h4 class="card-title">Région</h4>
        <!-- <p class="card-category">Created using Roboto Font Family</p>  -->
        </div>
        <div class="card-body">
            <div id="typography">
                  <div class="card-title">
                     <h2>Région</h2>
                  </div>
               <div class="content">
                    <div class="form-group my-3">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Rentrez le nom de la region..." value="{{ old('nom') ?? $region->nom }}">
                        @error('nom')
                            <div class="invalid-feedback">
                                {{ $errors->first('nom')}}
                            </div>   
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <select class="custom-select @error('republique_id') is-invalid @enderror" name="republique_id">
                                @foreach($republiques as $republique)
                            <option value="{{ $republique->id }}" {{ $republique->republique_id = $republique->id ? 'selected' : ''}}> {{ $republique->nomrep }} </option>
                            @endforeach
                       </select>
                            @error('republique_id')
                                <div class="invalid-feedback">
                                    {{ $errors->first('republique_id')}}
                                </div>   
                            @enderror
                    </div>
              </div>
            </div>
          </div>
   </div>
</div>