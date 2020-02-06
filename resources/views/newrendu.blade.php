@include('template')


@isset($rents)

<div style="" class="mt-3 ml-4">
        <a href="/admin" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
</div>

<div style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 200; font-size: 30px; text-align:center;" class=" mb-3 ml-4">
    choissisez une location pour effectuer le rendu
</div>

<table class="table">
    <thead>
      <tr style="text-align: center; font-size: 2em">
        <th scope="col">#</th>
        <th scope="col">Intitulé du locataire</th>
        <th scope="col">Voiture</th>
        <th scope="col">Date Départ</th>
        <th scope="col">Date Arrivé</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @foreach ($rents as $rent) 
    @if($rent->returnsForms_id == null)
    <tbody class="alert-warning">
    @else
    <tbody class="alert-success">
    @endif

        <a href="/admin/newrendufromrent/{{$rent->id}}">
        <tr style="text-align: center; color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 2em; font-size: 30px;">
        <th style="vertical-align: middle" scope="row">{{$rent->id}}</th>
                <td style="vertical-align: middle">{{$rent->user->nom}} {{$rent->user->prenom}}</td>
                <td style="vertical-align: middle">{{$rent->vehicle->marque}}, {{$rent->vehicle->modele}}</td>
                <td style="vertical-align: middle">{{$rent->dateDepart}}</td>   
                <td style="vertical-align: middle">{{$rent->dateArrive}}</td>  
                <td style="vertical-align: middle">
                    <div style="" class="text-center">
                    <a href="/admin/newrendufromrent/{{$rent->id}}" class="btn btn-danger" role="button" aria-pressed="true">Choisir</a>
                    </div>
                </td>      
        </tr>
        </a>
        @endforeach
    </tbody>
  </table>  
@endisset

