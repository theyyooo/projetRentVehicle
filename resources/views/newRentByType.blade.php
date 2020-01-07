@include('template')

<p style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 200; font-size: 30px; text-align:center;"> Choisissez votre vehicule  selon notre gamme de {{$type}}:  </p>

//FAIRE DES CARDS AVEC TOUT LES VEHICLE EXISTANT DANS LA BASE DE DONNÉES 

//AFFICHER LA DISPONIBILITE

//AFFICHER UN BOUTON POUR LE COMMANDER SI C'EST POSSIBLE

//CHOISIR LA DATE DE LOCATION 

//COMMANDE EFFECTUE

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
                          <a href="/newRentByCar/{{$vehicle->id}}" class="btn btn-success">disponible</a>
                          @else
                          <a href="" class="btn btn-danger">indisponible</a>  
                          @endif
                            
                          </div>
                  </div>
  
          </div>
</div>
@endforeach


    
