@include('template')

<?php

if (empty($_SESSION['pseudo']))
{
  if (isset($_POST['submit']))
  {
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['password1']) AND !empty($_POST['password2'])AND !empty($_POST['pseudo']))
    {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $mail = htmlspecialchars($_POST['mail']);
      $mdp = sha1($_POST['password1']);
      $mdp2 = sha1($_POST['password2']);
      $pseudolenght = strlen($pseudo);
      if ($pseudolenght <= 255)
      {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
          $ReqPseudo = $bdd-> prepare('SELECT * FROM client WHERE CLIPseudo = ?');
          $ReqPseudo -> execute(array($pseudo));
          $PseudoExiste = $ReqPseudo->RowCount();
          if ($PseudoExiste == 0)
          {
            $reqmail = $bdd-> prepare('SELECT * FROM client WHERE CLIMail = ?');
            $reqmail -> execute(array($mail));
            $mailexiste = $reqmail->RowCount();
            if ($mailexiste == 0)
            {
              if ($mdp == $mdp2)
              {
                if (strlen($_POST['password1']) >= 8)
                {
                  if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['password1']))
                  {
                    $insert_pharma = $bdd->prepare("INSERT INTO client(CLIPseudo, CLIMail, CLINom, CLIPrenom, CLIPassword) VALUES(?, ?, ?, ?, ?)");
                    $insert_pharma->execute(array($pseudo, $mail, $nom, $prenom, $mdp));
                    header('location: connexion.php');
                  }
                  else
                  {
                    $erreur = 'Votre mot de passe doit integrer majuscule(s), chiffre(s), caractère(s) specia(l)ux';
                  }
                }
                else
                {
                  $erreur = "votre mot de passe doit contenir au minimum 8 caractères";
                }
              }
              else
                {
                  $erreur = "Vos mots de passes ne correspondent pas";
                }
            }
            else {
             $erreur = "le mail existe déja !";
            }
          }
          else {
            $erreur = "le pseudo existe déja";
          }
        }
        else
        {
          $erreur = "email incorrect";
        }
      }
      else
      {
        $erreur = "Votre pseudo doit comporter moins de 255 caractères";
      }
    }
    else
    {
      $erreur = "Tous les champs doivent être complétées";
    }
  }
}
else {
  header('location: deconnection.php');
}
?>


<body>

  <div class="card d-block m-auto my-auto col-sm-11  mt-md-5 mb-sm-5 col-md-6 justify-content-center border-0 shadow-small">
    <div class="card-body">
      <?php
          if (isset($validation))
          {
            echo '<div style="color: green; text-align:center">'.$validation.'</div>';
          }
       ?>
      <h5 class="card-title text-center h1">Inscription</h5>
      <div style="color: #5c89c1;">
          <i class="fas fa-user-circle fa-5x d-block" style="text-align:center;"></i>
      </div>
      <form action="" method="POST">
        <div class="form-group">
          <label >Pseudo</label>
          <input type="text" class="form-control" required name="pseudo" placeholder="Votre Pseudo">
        </div>
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
          <label >Mot de passe</label>
          <input type="password" class="form-control" name="password1" placeholder="Mot de passe">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password2" placeholder="Répétez votre mot de passe">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Se souvenir de moi</label>
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