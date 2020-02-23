
@include('template')



<div class="pt-5 mb-2" style="background: url('../../assets/wave.svg'); background-size:cover; height:80vh">



  <div class="card mt-5" style="width: 50%; margin-left: 25%;">
    <div class="p-4">
      <h5 class="card-title text-center h1">Nouveau Véhicule</h5>
      <div style="width: 5%" class="mt-3 mb-3 ml-4">
          <a href="/admin" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
     </div>
      <div style="color: #5c89c1;">
            <i class="fas fa-car fa-5x d-block" style="text-align:center;"></i>
      </div>
      <form action="newVehicle" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label >Immatriculation</label>
          <input type="text" class="form-control" required name="Immatriculation" placeholder="Immatriculation de la voiture" >
        </div>
        <div class="form-group">
          <label >Marque</label>
          <input type="text" class="form-control" required name="Marque" placeholder="Marque de la voiture" >
        </div>
        <div class="form-group">
          <label >Modèle</label>
          <input type="text" class="form-control"  required name="Modele" placeholder="Modèle de la voiture" >
        </div>
        <div class="form-group">
        <label >Type</label>
          <div class="input-group mb-3">
              <select class="custom-select" name="Type" id="inputGroupSelect01">
                <option selected>Choisissez le Type</option>
                <option value="1">Berline</option>
                <option value="2">Break</option>
                <option value="3">S.U.V</option>
                <option value="3">Utilitaire</option>
              </select>
          </div>
        </div>

        <div class="form-group">
          <label >Photo</label>
          <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choisissez une image</label>
              </div>
            </div>
        </div>
        <div class="form-group">
            <label >Disponible ?</label>
        <div class="onoffswitch">
          <input type="checkbox" name="dispo" class="onoffswitch-checkbox" id="myonoffswitch" checked>
          <label class="onoffswitch-label" for="myonoffswitch"></label>
        </div>
        </div>


        <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white">Enregistrer le nouveau véhicule</button>
      </form>
      
      @isset($erreur)
      
      <div style="color: red; text-align:center; margin-top:20px;">{{$erreur}}</div>;
      
      @endisset


    </div>
  </div>
</div>

<style>
.width-1{
  width:100%;
}

.row{
  margin-left:0;
  margin-right:0;
}
</style>