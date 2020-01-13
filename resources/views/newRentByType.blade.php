@include('template')

<p class="mt-5" style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 200; font-size: 30px; text-align:center;"> Choisissez votre vehicule  selon notre gamme de {{$type}}:  </p>



@if(isset($loc))
    @if ($loc == 0)
        <div class="alert alert-success" style="width: 30%; margin-left: 35%; text-align:center" role="alert">
            1 location possible
        </div>
    @else

        <div class="alert alert-danger text-center" style="width: 30%; margin-left: 35%; text-align:center" role="alert">
            Vous avez déja une location en cours
        </div>

    @endif 
@else
    <div class="alert alert-warning" style="width: 30%; margin-left: 35%; text-align:center" role="alert">
        Vous devez vous<a href="/connexion" class="alert-link"> connecter </a>.
    </div>
@endif

    

@foreach ($vehicles as $vehicle)
<div class="shadow-lg p-3 mb-5 bg-white rounded" style="margin-top: 80px; width: 50%; margin-left: 25%;">
    <div class="container" style=" font-size: 20px;"> 
      <div class="row" style="text-align:center">
          <div class="col-lg-12" >
  
                  <div class="card">
                  <img src="../../assets/{{$vehicle->photo}}.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                          <h5 class="card-title" style="color: black;">{{$vehicle->modele}}</h5>
                          <p class="card-text">{{$vehicle->marque}}</p>
                              
                          @if ($vehicle->disponibilite == true)
                          <a href="/newRentBy/Car/{{$vehicle->id}}" class="btn btn-success">disponible</a>
                          @else
                          <a href="" class="btn btn-danger">indisponible</a>  
                          @endif
                            
                          </div>
                  </div>
  
          </div>
</div>
@endforeach


    
