
@include('template')

<div class="pt-5 mb-2" style="background: url('../../assets/wave.svg'); background-size:cover; height:80vh">
  <p class="mt-5 ml-5" style="font-family: 'Dancing Script', cursive; color: white; font-size: 4em; float:left;"> Louez autant que vous le souhaitez</p>
  <div class="card mt-5" style="width: 25%; margin-left: 54%;">
    <div class="p-4">
      <h5 class="card-title text-center h1">Inscription</h5>
      <div style="color: #5c89c1;">
          <i class="fas fa-user-circle fa-5x d-block" style="text-align:center;"></i>
      </div>
      <form action="inscriptionEx" method="POST">
        @csrf
        <div class="form-group">
          <label >Nom</label>
          <input type="text" class="@error('nom') is-invalid @enderror form-control"  name="nom" placeholder="Votre nom" > 
          @error('nom')
           <div class="invalid-feedback">Vous ne pouvez pas mettre des caractères numérique</div>
          @enderror
        </div>
        <div class="form-group">
          <label >Prénom</label>
          <input type="text" class=" @error('prenom') is-invalid @enderror form-control"  name="prenom" placeholder="Votre prénom" >
          @error('prenom')
           <div class="invalid-feedback">Vous ne pouvez pas mettre des caractères numérique</div>
          @enderror
        </div>
        <div class="form-group">
          <label >Email</label>
          <input type="email" class="@error('mail') is-invalid @enderror form-control"   name="mail" placeholder="Votre email" >
          @error('mail')
           <div class="invalid-feedback">veuillez rentrer une adresse mail valide</div>
          @enderror
        </div> 
        <div class="form-group">
          <label >Mot de passe</label>
          <input type="password" class="@error('password1') is-invalid @enderror form-control" name="password1" placeholder="Mot de passe">
          @error('password1')
           <div class="invalid-feedback">Votre mot de passe doit contenir au minimum 5 caractères</div>
          @enderror
        </div>
        <div class="form-group">
          <input type="password" class="@error('password2') is-invalid @enderror form-control" name="password2" placeholder="Répétez votre mot de passe">
          @error('password2')
           <div class="invalid-feedback">Votre mot de passe doit être identique</div>
          @enderror
        </div>

        <button type="submit" name="submit" class="btn btn-warning width-1" style="background-color: #5c89c1; border-color: #5c89c1;color:white">Creer un compte</button>
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