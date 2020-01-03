@include('template')

<body>

  <div class="card d-block m-auto my-auto col-sm-11  mt-md-5 mb-sm-5 col-md-6 justify-content-center border-0 shadow-small">
    <div class="card-body">
      <h5 class="card-title text-center h1">Inscription</h5>
      <div style="color: #5c89c1;">
          <i class="fas fa-user-circle fa-5x d-block" style="text-align:center;"></i>
      </div>
      <form action="inscriptionEx" method="POST">
        @csrf
        <div class="form-group">
          <label >Nom</label>
          <input type="text" class="form-control" required name="nom" placeholder="Votre nom" >
        </div>
        <div class="form-group">
          <label >Prénom</label>
          <input type="text" class="form-control" required name="prenom" placeholder="Votre prénom" >
        </div>
        <div class="form-group">
          <label >Email</label>
          <input type="email" class="form-control"  required name="mail" placeholder="Votre email" >
        </div>
        <div class="form-group">
          <label >Votre date d'anniversaire</label>
          <input type="text" class="form-control"  required name="anniversaire" placeholder="Votre anniversaire en format AAAA-MM-JJ" >
        </div>
        <div class="form-group">
          <label >Votre adresse</label>
          <input type="text" class="form-control"  required name="adresse" placeholder="Votre adresse" >
        </div>
        <div class="form-group">
          <label >Votre ville</label>
          <input type="text" class="form-control"  required name="ville" placeholder="Votre ville" >
        </div>
        <div class="form-group">
          <label >Votre pays</label>
          <input type="text" class="form-control"  required name="pays" placeholder="Votre pays" >
        </div>
        <div class="form-group">
          <label >Votre code postal</label>
          <input type="text" class="form-control"  required name="cp" placeholder="Votre code postal" >
        </div>
        <div class="form-group">
          <label >Votre numéro</label>
          <input type="text" class="form-control"  required name="tel" placeholder="Votre numéro" >
        </div>
        <div class="form-group">
          <label >Mot de passe</label>
          <input type="password" class="form-control" name="password1" placeholder="Mot de passe">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password2" placeholder="Répétez votre mot de passe">
        </div>

        <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white">Creer un compte</button>
      </form>
      <?php
          if (isset($erreur))
          {
            echo '<div style="color: red">'.$erreur.'</div>';
          }
       ?>
       <div class="alert alert-success mt-4 text-center" role="alert">
           Déja inscrit ?  <a href="connexion" class="alert-link">Connectez-vous</a> maintenant.
       </div>
    </div>
  </div>
</body>

<style>
.width-1{
  width:100%;
}
.btn-primary{
  background-color:
}
</style>