
  @include('template')

  @isset($alert_success) 
    <div class="alert alert-success text-center" role="alert">
      {{$alert_success}} 
    </div>
  @endisset

  <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel" style="width: 90%; margin-left: 5%">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img class="d-block w-100" src="../../assets/carousel1.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <p style="font-size: 3em">Rêvez en grand</p>
            <p style="font-size:2em">Pensez à vous inscrire pour profitez d'un vehicule</p>
          </div>
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="../../assets/carousel2.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <p style="font-size: 3em">Rêvez en grand</p>
            <p style="font-size:2em">Pensez à vous inscrire pour profitez d'un vehicule</p>
          </div>
      </div>
      <div class="carousel-item">
        
          <img class="d-block w-100" src="../../assets/carousel3.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <p style="font-size: 3em">Rêvez en grand</p>
            <p style="font-size:2em">Pensez à vous inscrire pour profitez d'un vehicule</p>
          </div>
        
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div style="width: 90%; margin-left: 5%; background-color: grey">

      <h1 style="color: white" class="pt-5 text-center">GALAXY SWISS BOURDIN</h1>

      <p style="color: white; font-size: 30px" class="pt-5 text-center pl-5 pr-5 pb-5 mb-0">
        Le laboratoire Galaxy Swiss Bourdin (GSB) est issu de la fusion entre le géant américain Galaxy et le conglomérat européen Swiss Bourdin , lui même déjà union de trois petits laboratoires . En 2009, les deux géants pharmaceutiques ont uni leurs forces pour créer un leader de ce secteur industriel. L’entité Galaxy Swiss Bourdin Europe a établi son siège administratif à Paris .Elle dispose d’agents qui sont amenés à souvent effectuer des déplacements professionnels, déplacements qui engendrent des frais. La méthode de saisie de ces frais varie en fonction de la structure d’origine du salarié. L’une d’elles consiste à passer par une application en ligne afin de saisir les informations.

        Notre travail consistait en la modification de cette application afin de la rendre plus complète et plus sécurisée.
      </p>

  </div>

  <div style="width: 90%; margin-left: 5%; background-color: #a4abb3" class="mt-0">

    <h1 style="color: white" class="pt-5 text-center">Contactez nous</h1>

    <p style="color: white; font-size: 30px" class="pt-5 text-center pl-5 pr-5 pb-2">
      En cas de problème pour réservez un véhicule, merci de contacter </br> M.BLANCHARD au 06.48.64.28.58
    </p>

    <p style="color: white; font-size: 30px" class="pt-5 text-center pl-5 pr-5 pb-5">
      Pour toutes questions ou autres problème, merci de contacter le service RH de GSB </br> au 04.58.48.51.95
    </p>

</div>