@include('template')


@isset($rents)
<table class="table">
    <thead>
      <tr style="text-align: center; font-size: 2em">
        <th scope="col">#</th>
        <th scope="col">Intitulé du locataire</th>
        <th scope="col">Voiture</th>
        <th scope="col">Date Départ</th>
        <th scope="col">Date Arrivé</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($rents as $rent)
        <tr style="text-align: center; color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 2em; font-size: 30px;">
        <th style="vertical-align: middle" scope="row">{{$rent->id}}</th>
                <td style="vertical-align: middle">{{$rent->user->nom}} {{$rent->user->prenom}}</td>
                <td style="vertical-align: middle">{{$rent->vehicle->marque}}, {{$rent->vehicle->modele}}</td>
                <td style="vertical-align: middle">{{$rent->dateDepart}}</td>   
                <td style="vertical-align: middle">{{$rent->dateArrive}}</td>  
                <td style="vertical-align: middle">
                    <div style="" class="text-center">
                        <a href="/admin/rent/{{$rent->id}}/delete" class="btn btn-danger" role="button" aria-pressed="true">Supprimer cette location</a>
                    </div>
                </td>      
        </tr>
        @endforeach
    </tbody>
  </table>  
@endisset

