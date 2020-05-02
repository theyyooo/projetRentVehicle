@include('template')

<p class="mt-5" style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 200; font-size: 30px; text-align:center;"> Votre location en cours:    </p>
@isset($myRents)
    @if(count($myRents) == 0 AND Auth::check() == true)
    <div class="alert alert-danger text-center mt-5" style="width: 30%; margin-left: 35%; text-align:center; " role="alert">
        Vous n'avez aucune location en cours    
    </div>
    @endif
@endisset

@if (Auth::check() == false)
    <div class="alert alert-danger text-center mt-5" style="width: 30%; margin-left: 35%; text-align:center; " role="alert">
        Vous n'êtes pas connecté 
    </div>
@endif

@isset($myRents)
    @foreach ($myRents as $Rent)
    <div class="shadow-lg p-3 mb-5 bg-white rounded" style="margin-top: 80px; width: 50%; margin-left: 25%;">
        <div class="container" style=" font-size: 20px;"> 
        <div class="row" style="text-align:center">
            <div class="col-lg-12" >
    
                    <div class="card">
                    <img src="../../storage/uploads/{{$Rent->vehicle->photo}}.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title" style="color: black;">{{$Rent->vehicle->modele}}</h5>
                            <p class="card-text">{{$Rent->vehicle->marque}}</p>

                            <p class="card-text mt-3 text-success"> Date de départ: {{$Rent->date_depart}}</p>
                            <p class="card-text text-danger">Date d'arrivée: {{($Rent->date_arrive)}}</p>
                            <div class="alert alert-warning" style="width: 30%; margin-left: 35%; text-align:center" role="alert">
                            <a href="/connexion" class="alert-link">Il vous reste {{\Carbon\Carbon::parse($Rent->date_arrive)->diffInDays($date)}} jours</a>.
                            </div>                         
                            </div>
                    </div>
    
            </div>
        </div>
        </div>
    </div>
    @endforeach
@endisset




    


    


