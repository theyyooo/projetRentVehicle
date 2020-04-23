
@include('template')



<div class="pt-5 mb-2" style="background: url('../../assets/wave.svg'); background-size:cover; height:80vh">
 


  <div class="card mt-5" style="width: 50%; margin-left: 25%;">
    <div class="p-4">
    <h5 class="card-title text-center h1">Nouveau rendu de la location {{$rent->id}}</h5>
      <div style="width: 5%" class="mt-3 mb-3 ml-4">
          <a href="/admin/newrendu" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
     </div>
      <div style="color: #5c89c1;">
            <i class="fas fa-car fa-5x d-block" style="text-align:center;"></i>
      </div>
    <form action="/admin/newrendufromrentex/{{$rent->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label >Date départ</label>
          <input type="date" class="@error('dateDepart') is-invalid @enderror form-control"   name="dateDepart" placeholder="Date de départ du véhicule" >
          @error('dateDepart')
           <div class="invalid-feedback">La date n'est pas valide</div>
          @enderror
        </div>
        <div class="form-group">
          <label >Date Arrivé</label>
          <input type="date" class=" @error('dateArrive') is-invalid @enderror form-control"   name="dateArrive" placeholder="Date d'arrivé du véhicule" >
          @error('dateArrive')
           <div class="invalid-feedback">La date n'est pas valide</div>
          @enderror
        </div>


        <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white">Enregistrer le rendu</button>
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