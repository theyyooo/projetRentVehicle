@include('template')

<div class="pt-5 mb-2" style="background: url('/../../assets/wave.svg'); background-size:cover; height:80vh">
    <div class="card mt-5" style="width: 50%; margin-left: 25%;">
        <div style="width: 40%;" class="text-left mt-5 ml-5">
            <a href="/admin/allpersonnes" class="btn btn-secondary width-1" style="color:white; vertical-align" role="button" aria-pressed="true"><i class="fas fa-undo-alt"></i></a>
        </div>
      <div class="p-4">
        <h5 class="card-title text-center h1">Modification du profil  {{$user->prenom}} {{$user->nom}}</h5>
        <div style="color: #5c89c1; width: 100%;">
            <i class="fas fa-user-circle fa-5x d-block" style="text-align:center;"></i>
        </div>
      <form action="/admin/personne/{{$user->id}}/edit" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label >Nom</label>
            <input type="text" class="form-control" required name="nom" value="{{$user->nom}}" >
          </div>
          <div class="form-group">
            <label >Prenom</label>
            <input type="text" class="form-control" required name="prenom" value="{{$user->prenom}}" >
          </div>
          <div class="form-group">
            <label >Mail</label>
            <input type="text" class="form-control"  required name="mail" value="{{$user->mail}}" >
          </div>

          <div class="form-group">
              <label >Location en cours ?</label>
          <div class="onoffswitch">
            <input type="checkbox" name="location" class="onoffswitch-checkbox" id="myonoffswitch" @if($user->vehicle)checked @endif>
            <label class="onoffswitch-label" for="myonoffswitch"></label>
          </div>
          </div>

          <div class="form-group">
            <label >Administrateur ?</label>
        <div class="onoffswitch">
          <input type="checkbox" name="admin" class="onoffswitch-checkbox" id="myonoffswitch" @if($user->admin)checked @endif>
          <label class="onoffswitch-label" for="myonoffswitch"></label>
        </div>
        </div>
  
          <div style="width: 50%; float: left" class="text-center">
            <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white;">Enregistrer les modifications</button>
          </div>

           

          <div style="width: 33%; margin-left: 50%" class="text-center">
            <a href="/admin/personne/{{$user->id}}/delete" class="btn btn-danger" role="button" aria-pressed="true">Supprimer ce compte</a>
          </div>


        </form>
        
        @isset($erreur)
        
        <div style="color: red; text-align:center; margin-top:20px;">{{$erreur}}</div>;
        
        @endisset

    </div>
</div>
</div>