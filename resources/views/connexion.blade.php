@include('template')

<div class="pt-5 mb-2" style="background: url('../../assets/wave.svg'); background-size:cover; height:80vh">
  <p class="mt-5 ml-5" style="font-family: 'Dancing Script', cursive; color: white; font-size: 4em; float:left;"> Louez autant que vous le souhaitez</p>
  <div class="card mt-5" style="width: 25%; margin-left: 54%;">
    <div class="p-4">
      <h5 class="card-title text-center h1">Connexion</h5>
      <div style="color: #5c89c1;">
          <i class="fas fa-user-circle fa-5x d-block" style="text-align:center;"></i>
      </div>
      <form action="connexionEx" method="POST">
      @csrf
        <div class="form-group" style="width: 90%; margin-left:5%">
          <label >Mail</label>
          <input type="texte" name="mail" class="form-control"  placeholder="Votre mail">
        </div>
        <div class="form-group" style="width: 90%; margin-left:5%">
          <label >Mot de passe</label>
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        </div>
        <div class="" style="width: 45%; margin-left:27.5%">
        <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1; color:white">Se connecter</button>
        </div>
      </form>
      
      @isset($erreur)
      
      <div style="color: red; text-align:center; margin-top:20px;">{{$erreur}}</div>;
      
      @endisset
      
      <div class="alert alert-success mt-4 text-center" role="alert">
          Pas encore inscrit ?  <a href="inscription" class="alert-link">Rejoignez-nous</a> maintenant.
      </div>

    </div>
  </div>
</div>

<style>
.width-1{
  width:100%;
}

.row{
  margin-left:0;
  margin-right:0;
}
</style>