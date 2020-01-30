@include('template')

@isset($vehicles)
<table class="table">
    <thead>
      <tr style="text-align: center; font-size: 2em">
        <th scope="col">#</th>
        <th scope="col">Immatriculation</th>
        <th scope="col">Marque</th>
        <th scope="col">Modèle</th>
        <th scope="col">Type</th>
        <th scope="col">Disponibilité</th>
        <th scope="col">image</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($vehicles as $vehicle)
        <tr style="text-align: center; color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 2em; font-size: 30px;">
                <th style="vertical-align: middle" scope="row">{{$vehicle->id}}</th>
                <td style="vertical-align: middle"> {{$vehicle->immatriculation}}</td>
                <td style="vertical-align: middle">{{$vehicle->marque}}</td>
                <td style="vertical-align: middle">{{$vehicle->modele}}</td>
                <td style="vertical-align: middle">{{$vehicle->type}}</td>

                @if($vehicle->disponibilite)
                
                <td style="vertical-align: middle">Disponible</td>

                @else

                <td style="vertical-align: middle">Non-disponible</td>

                @endif
        
                <td style="width: 30%; vertical-align: middle">
                  <div class="container2">
                    <img class="btn-img"  src="../../storage/uploads/{{$vehicle->photo}}.jpg" alt="" />
                    <p class="title"><i class="fas fa-hand-point-up"></i></p>
                    <div class="overlay"></div>
                    <div class="button"><a href="/admin/vehicle/{{$vehicle->id}}"> MODIFIER </a></div>
                  </div>
                </td>
        </tr>
        @endforeach
    </tbody>
  </table>  
@endisset

