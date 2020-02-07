@include('template')


@isset($incidents)

<div style="" class="mt-3 mb-3 ml-4">
        <a href="/admin" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
</div>

<table class="table">
    <thead>
      <tr style="text-align: center; font-size: 2em">
        <th scope="col">#</th>
        <th scope="col">immatriculation</th>
        <th scope="col">Description</th>
        <th scope="col">Date du sinistre</th>
        <th scope="col">Date de réparation</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($incidents as $incident)
        <tr  style="text-align: center; color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 2em; font-size: 30px;">
                <th style="vertical-align: middle" scope="row">{{$incident->id}}</th>
                <td style="vertical-align: middle"> {{$incident->vehicle->immatriculation}}</td>
                <td style="vertical-align: middle">{{$incident->description}}</td>
                <td style="vertical-align: middle">{{$incident->date}}</td>
                <td style="vertical-align: middle">{{$incident->dateReparation}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>  
@endisset

