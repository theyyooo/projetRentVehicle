
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
  <div style="width: 90%; margin-left: 5%; background-color: grey; height: 100vh">

  </div>