@include('template')


@isset($users)
<table class="table">
    <thead>
      <tr style="text-align: center; font-size: 2em">
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Mail</th>
        <th scope="col">Location en cours ?</th>
        <th scope="col">Admin</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr style="text-align: center; color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 2em; font-size: 30px;">
                <th style="vertical-align: middle" scope="row">{{$user->id}}</th>
                <td style="vertical-align: middle"> {{$user->nom}}</td>
                <td style="vertical-align: middle">{{$user->prenom}}</td>
                <td style="vertical-align: middle">{{$user->mail}}</td>
                @if ($user->vehicle)
                <td style="vertical-align: middle">oui</td>
                @else
                <td style="vertical-align: middle">non</td>
                @endif
                @if ($user->admin)
                <td style="vertical-align: middle">oui</td>
                @else
                <td style="vertical-align: middle">non</td>
                @endif
                <td style="vertical-align: middle">
                    <div class="text-center">
                    <a href="/admin/personne/{{$user->id}}/edit" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true">Option</a>
                    </div>
                </td>
            
        </tr>
        @endforeach
    </tbody>
  </table>  
@endisset

