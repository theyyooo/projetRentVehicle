
@include('template')

 

<div class="pt-5 mb-2" style="background: url('../../assets/wave.svg'); background-size:cover; height:80vh">



  <div class="card mt-5" style="width: 50%; margin-left: 25%;">
    <div class="p-4">
      <h5 class="card-title text-center h1">Ajouter un sinistre</h5>
      <div style="width: 5%" class="mt-3 mb-3 ml-4">
          <a href="/admin" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
     </div>
      <div style="color: #5c89c1;">
            <i class="fas fa-car-crash fa-5x d-block" style="text-align:center;"></i>
      </div>
      <form action="newincident" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label >Voiture</label>
            <div class="input-group mb-3">
                <select class="custom-select" name="voiture" id="inputGroupSelect01">
                  <option selected>Choisissez la voiture</option>

                  @foreach($voitures as $voiture)

                <option value="{{$voiture->id}}">{{$voiture->immatriculation}} | {{$voiture->marque}}  |  {{$voiture->modele}}</option>

                  @endforeach

                </select>
            </div>
          </div>
        <div class="form-group" >
          <label >Desciption de la collision</label>
          <input  type="text" class="form-control" required name="Description" placeholder="Description de la voiture " >
        </div>
        <div class="form-group">
            <label >Date de la collision</label>
            <input type="date" class="form-control"  required name="Datecollision" placeholder="Date de la collision" >
          </div>
        <div class="form-group">
          <label >Date de la réparation (si effectué)</label>
          <input type="date" class="form-control"  name="Datereparation" placeholder="" >
        </div>


        <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white">Enregistrer le nouveau sinistre</button>
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