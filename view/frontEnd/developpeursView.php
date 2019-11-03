<?php 
// PAGE DEVELOPPEURS
ob_start(); 
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Développeurs</title>
    <meta charset="utf-8">
    <!--Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <!--CCS Stylsheet-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/developpeurs.css">
    <link rel="stylesheet" href="./public/css/mdb.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>

  <body>
    
    <div class="bg-light">
      <div class="container py-5">
        <div class="row h-100 align-items-center py-5">
          <div class="col-lg-6">
            <h1 class="display-4 font-weight-light">Découvrer notre équipe ! </h1>
            <p class="lead text-muted mb-0">Parce que c'est un projet qui nous tient à coeur !</p>

          </div>
          <div class="col-lg-6 d-none d-lg-block"><img src="https://images.unsplash.com/photo-1535551951406-a19828b0a76b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1046&q=80" alt="" class="img-fluid"></div>
        </div>
      </div>
    </div>

    <div class="bg-white py-5">
      <div class="container py-5">
        <div class="row align-items-center mb-5">
          <div class="col-lg-6 order-2 order-lg-1"><i class="fab fa-bar-chart fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Une équipe technique incroyable !</h2>
            <p class="font-italic text-muted mb-4">Conçu par une équipe de développeurs passionnés.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
          </div>
          <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://images.unsplash.com/photo-1504639725590-34d0984388bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=967&q=80" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-5 px-5 mx-auto"><img src="./public/images/iut.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
          <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Promo 2018/2020</h2>
            <p class="font-italic text-muted mb-4">DUT Informatique 2A</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-light py-5">
      <div class="container py-5">
        <div class="row mb-4">
          <div class="col-lg-5">
            <h2 class="display-4 font-weight-light">Notre équipe</h2>
            <p class="font-italic text-muted">La crème de la crème.</p>
          </div>
        </div>

        <div class="row text-center">
          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834132/avatar-4_ozhrib.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Vincent Nguyen</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <!-- End-->

          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834130/avatar-3_hzlize.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Victor Truong</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <!-- End-->

          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Thomas Noirclerc</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <!-- End-->

          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Frédéric Lay</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <!-- End-->

        </div>
      </div>
    </div>

   <a id="back-to-top" href="#" class="btn btn-blue-gradient btn-lg back-to-top"role="button"><i class="fas fa-chevron-up"></i></a>

  </body>
</html>

<?php 
$contenu = ob_get_clean(); 
require 'template.php'; 