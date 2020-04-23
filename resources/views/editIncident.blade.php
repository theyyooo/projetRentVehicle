@include('template')

<div class="pt-5 mb-2" style="background: url('/../../assets/wave.svg'); background-size:cover; height:80vh">
    <div class="card mt-5" style="width: 50%; margin-left: 25%;">
        <div style="width: 40%;" class="text-left mt-5 ml-5">
            <a href="/admin/allincident" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
        </div>
      <div class="p-4">
      <h5 class="card-title text-center h1">Modification de l'incident {{$incident->id}}</h5>
        <div style="color: #5c89c1; width: 100%;">
              <i class="fas fa-car fa-5x d-block" style="text-align:center;"></i>
        </div>
      <form action="/admin/incident/{{$incident->id}}/edit" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label >Voiture</label>
              <div class="input-group mb-3">
                  <select class="custom-select" name="voiture" id="inputGroupSelect01">
                    <option value="aucun" selected>Choisissez la voiture</option>
  
                    @foreach($voitures as $voiture)
  
                  <option value="{{$voiture->id}}">{{$voiture->immatriculation}} | {{$voiture->marque}}  |  {{$voiture->modele}}</option>
  
                    @endforeach
  
                  </select>
              </div>
            </div>
          <div class="form-group" >
            <label >Desciption de la collision</label>
          <input  type="text" class="@error('Description') is-invalid @enderror form-control"  name="Description" value="{{$incident->description}}">
            @error('Desciption')
              <div class="invalid-feedback">Merci de remplir ce champs</div>
            @enderror
          </div>
          <div class="form-group">
              <label >Date de la collision</label>
              <input type="date" class="@error('Datecollision') is-invalid @enderror form-control"   name="Datecollision" value="{{$incident->date}}" >
              @error('Datecollision')
               <div class="invalid-feedback">Merci de remplir ce champs</div>
              @enderror
            </div>
          <div class="form-group">
            <label >Date de la réparation</label>
            <input type="date" class="@error('Datereparation') is-invalid @enderror form-control"  name="Datereparation" @if(isset($incident->dateReparation)) value="{{$incident->dateReparation}}" @endif >
            @error('Datereparation')
              <div class="invalid-feedback">Merci de remplir ce champs</div>
            @enderror
          </div>
  
          <div style="width: 50%; float: left" class="text-center">
            <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white;">Enregistrer les modifications</button>
          </div>

          <div style="width: 33%; margin-left: 50%" class="text-center">
            <a href="/admin/incident/{{$incident->id}}/delete" class="btn btn-danger" role="button" aria-pressed="true">Supprimer ce compte</a>
          </div>

        </form>
        
        @isset($erreur)
        
        <div style="color: red; text-align:center; margin-top:20px;">{{$erreur}}</div>;
        
        @endisset
      </div>
    </div>
</div>