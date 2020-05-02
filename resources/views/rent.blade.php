@include('template')


@isset($rents)

<div style="" class="mt-3 mb-3 ml-4">
        <a href="/admin" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
</div>

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
                <td style="vertical-align: middle">{{$rent->date_depart}}</td>   
                <td style="vertical-align: middle">{{$rent->date_arrive}}</td>  
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

