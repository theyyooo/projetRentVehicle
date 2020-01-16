<div class="shadow p-3  bg-white rounded">
<nav class="navbar navbar-expand-lg navbar-light  "style="font-size: 30px;">
  <a class="navbar-brand" href="/"><img src="../../assets/logo_v.png" alt="" style="height: 60px;"></img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item pl-4 pr-4">
        <a class="nav-link" href="/newRent"><i class="fas fa-car"></i> Louer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/allRent"><i class="fas fa-tasks"></i> Toutes mes locations</a>
      </li>
      <li class="nav-item pl-4 pr-4">
        <a class="nav-link" href="/currentRent"> <i class="fas fa-spinner"></i> Ma location en cours</a>
      </li>

      @if(Auth::check() == true)
      
      <li class="nav-item dropdown" style="">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-user-circle"></i> {{Auth::user()->prenom}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/deconnection">Déconnectez-vous</a>
          @if(Auth::user()->admin)
            <a class="dropdown-item" href="/admin">Gestion administrateur</a>
          </div>
        @endif
        </div>
      </li>

      

      @else 

      <li class="nav-item dropdown" style=";">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="far fa-user-circle"></i>  Mon compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/connexion">Connexion</a>
          <a class="dropdown-item" href="/inscription">Inscription</a>
        </div>
  </li>

      @endif
   
    </ul>
  </div>
</nav>
</div>