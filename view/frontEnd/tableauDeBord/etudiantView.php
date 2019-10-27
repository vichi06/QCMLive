<?php
// PAGE D'ACCUEIL DE L'ETUDIANT
ob_start(); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bienvenue Etudiant</title>
    <meta charset="utf-8">
    <!--Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <!--CCS Stylsheet-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/dashboard.css">
    <link rel="stylesheet" href="./public/css/mdb.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="./public/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>

  <!-- Vertical navbar -->
  <div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
        <div class="media-body">
          <h4 class="m-0"></h4>
          <p class="font-weight-light text-muted mb-0">Etudiant</p>
        </div>
      </div>
    </div>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic bg-light">
        <a href=""><i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                  Accueil </a>
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                  Statistiques
              </a>
      </li>
      <li class="nav-item">
        <a href="deconnexion.php" class="nav-link text-dark font-italic">
                  <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                  Deconnexion
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                  A propos 
              </a>
      </li>
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                  Area charts
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                  Bar charts
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                  Pie charts
              </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
                  <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                  Line charts
              </a>
      </li>
    </ul>
  </div>
  <!-- End vertical navbar -->


  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

  <!-- Demo content -->

  </div>
  <!-- End demo content -->


  <?= $_SESSION['profil']['nom']; ?>
  <p> Rejoignez une session en cours (insérez nom du test) : 
    <form action="./index.php" method="get"> 
      <input type="text" placeholder="Nom du test" name="test">
      <input type="submit" class="fadeIn fourth" value="Se connecter">
    </form>   
  </p> 

</html>

<?php 
$contenu = ob_get_clean();
require './view/frontEnd/template.php';

