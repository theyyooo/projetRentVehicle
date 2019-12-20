@include('template')



<body>

  <div class="row mb-5">
    <div class="card d-block m-auto my-auto col-sm-11  mt-md-5 mb-sm-5 col-md-6 justify-content-center border-0 shadow-small">
      <div class="card-body">
        <h5 class="card-title text-center h1">Connexion</h5>
        <div style="color: #5c89c1;">
            <i class="fas fa-user-circle fa-5x d-block" style="text-align:center;"></i>
        </div>
        <form action="connexionEx" method="POST">
        @csrf
          <div class="form-group">
            <label >Mail</label>
            <input type="texte" name="mail" class="form-control"  placeholder="Votre mail">
          </div>
          <div class="form-group">
            <label >Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          </div>
          <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1; color:white">Se connecter</button>
        </form>
        <?php
            if (isset($erreur))
            {
              echo '<div style="color: red; text-align:center; margin-top:20px;">'.$erreur.'</div>';
            }
         ?>
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