@include('template')

<div class="pt-5 mb-2" style="background: url('/../../assets/wave.svg'); background-size:cover; height:80vh">
    <div class="card mt-5" style="width: 50%; margin-left: 25%;">
        <div style="width: 40%;" class="text-left mt-5 ml-5">
            <a href="/admin/allvehicle" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
        </div>
      <div class="p-4">
        <h5 class="card-title text-center h1">Modification de  {{$unvehicle->marque}}, {{$unvehicle->modele}}</h5>
        <div style="color: #5c89c1; width: 100%;">
              <i class="fas fa-car fa-5x d-block" style="text-align:center;"></i>
        </div>
      <form action="/admin/vehicle/{{$unvehicle->id}}/edit" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label >Immatriculation</label>
            <input type="text" class=" @error('Immatriculation') is-invalid @enderror form-control"  name="Immatriculation" value="{{$unvehicle->immatriculation}}" >
            @error('Immatriculation')
            <div class="invalid-feedback">Le format doit être (XX-XXX-XX)</div>
            @enderror
          </div>
          <div class="form-group">
            <label >Marque</label>
            <input type="text" class=" @error('Marque') is-invalid @enderror form-control"  name="Marque" value="{{$unvehicle->marque}}" >
            @error('Marque')
            <div class="invalid-feedback">Merci de remplir ce champs</div>
            @enderror
          </div>
          <div class="form-group">
            <label >Modèle</label>
            <input type="text" class=" @error('Modele') is-invalid @enderror form-control"   name="Modele" value="{{$unvehicle->modele}}" >
            @error('Modele')
            <div class="invalid-feedback">Merci de remplir ce champs</div>
            @enderror
          </div>
          <div class="form-group">
          <label >Type</label>
            <div class="input-group mb-3">
                <select class="custom-select" name="Type" id="inputGroupSelect01">
                  <option selected value="0">Choisir le type</option>
                  <option value="1">Berline</option>
                  <option value="2">Break</option>
                  <option value="3">S.U.V</option>
                  <option value="4">Utilitaire</option>
                </select>
            </div> 
          </div>
          <div class="form-group">
              <label >Disponible ?</label>
          <div class="onoffswitch">
            <input type="checkbox" name="dispo" class="onoffswitch-checkbox" id="myonoffswitch" @if($unvehicle->disponibilite)checked @endif>
            <label class="onoffswitch-label" for="myonoffswitch"></label>
          </div>
          </div>
  
          <div style="width: 50%; float: left" class="text-center">
            <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white;">Enregistrer les modifications</button>
          </div>

          

          <div style="width: 33%; margin-left: 50%" class="text-center">
            <a href="/admin/vehicle/{{$unvehicle->id}}/delete" class="btn btn-danger" role="button" aria-pressed="true">Supprimer ce vehicule</a>
          </div>


        </form>
        
        @isset($erreur)
        
        <div style="color: red; text-align:center; margin-top:20px;">{{$erreur}}</div>;
        
        @endisset
      </div>
    </div>
</div>