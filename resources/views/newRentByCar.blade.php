@include('template')

@foreach ($vehicle as $unvehicle)
<p class="mt-5" style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 200; font-size: 30px; text-align:center;">{{$unvehicle->marque}}, {{$unvehicle->modele}}</p>
<div class="shadow-lg p-3 mb-5 bg-white rounded" style="margin-top: 80px; width: 50%; margin-left: 25%;">
    <div class="container" style=" font-size: 20px;"> 
      <div class="row" style="text-align:center">
          <div class="col-lg-12" >
  
                  <div class="card">
                  <img src="../../storage/uploads/{{$unvehicle->photo}}.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                          <h5 class="card-title" style="color: black;">{{$unvehicle->modele}}</h5>
                          <p style="border-bottom: 3px black solid; margin-bottom: 50px;padding-bottom: 25px;" class="card-text">{{$unvehicle->marque}}</p>                              
                            <form action="/Rent" method="POST">
                                    @csrf
                                    <div class="form-group" style="width:40%; margin-left: 30%;">
                                        <label >Date de début:</label>
                                        <input type="date" name="datedebut" class="form-control">
                                    </div>

                                    <div class="form-group" style="width:40%; margin-left: 30%;">
                                        <label >Date de fin:</label>
                                        <input type="date" name="datefin" class="form-control">
                                    </div>
                                    <input id="id" name="id" type="hidden" value="{{$id}}">

                                    <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: green; border-color: #5c89c1; color:white">Réserver</button>
                            </form>
                          </div>
                  </div>
  
          </div>
</div>
@endforeach

