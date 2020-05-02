@include('template')


@isset($forms)

<div style="" class="mt-3 mb-3 ml-4">
        <a href="/admin" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
</div>

<table class="table">
    <thead>
      <tr style="text-align: center; font-size: 2em">
        <th scope="col">#</th>
        <th scope="col">id de la location</th>
        <th scope="col">Date de départ</th>
        <th scope="col">Date d'arrivé</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($forms as $form)
        <tr  style="text-align: center; color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 2em; font-size: 30px;">
                <th style="vertical-align: middle" scope="row">@if(isset($form->returnForm->id)){{$form->returnForm->id}}@else En attente @endif</th>
                <td style="vertical-align: middle"> {{$form->id}}</td>
                <td style="vertical-align: middle">@if(isset($form->returnForm->date_depart)){{$form->returnForm->date_depart}}@else En attente @endif</td>
                <td style="vertical-align: middle">@if(isset($form->returnForm->date_arrive)){{$form->returnForm->date_arrive}}@else En attente @endif</td>
        </tr>
        @endforeach
    </tbody>
  </table>  
@endisset

