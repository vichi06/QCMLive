<?php 
// PAGE UTILISATION 1
ob_start(); 
?>

<!DOCTYPE html>
<html>

<!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <br>
      <h1 class="my-4">Tutoriel d'utilisation,
        <small>Prenez le temps de comprendre</small>
      </h1>

      <!-- Project One -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Accueil</h3>
          <p>Un accueil chaleureux pour une personne en quête de connaissance ou de partage, où vous pouvez choisir votre rôle profil. Professeurs, prenez contrôle de vos QCMs en cliquant sur le bouton PROFESSEUR. Etudiants, allez vite rejoindre votre test avec le bouton ETUDIANT.</p>
          <a class="btn btn-primary" href="./index.php">Accueil</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Two -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Menu</h3>
          <p>Grâce à notre User Experience, le menu a été élaboré afin que vous puissiez naviguer en toute sérénité dans un environnement épuré et simple.</p>
          <a class="btn btn-primary" href="#">Aucune page correspond au menu boloss</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Three -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Les Développeurs</h3>
          <p>Jetez un coup d'oeil à la page LES DEVELOPPEURS pour nous connaître un peu plus et partagez votre avis.</p>
          <a class="btn btn-primary" href="./index.php?action=pageDeveloppeurs">Les Développeurs</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Four -->
      <div class="row">

        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Utilisation</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
          <a class="btn btn-primary" href="#">Vous êtes déjà dans Utilisation</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="./index?action=pageUtilisation1" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="./index.php?action=pageUtilisation1">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="./index.php?action=pageUtilisation2">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="./index.php?action=pageUtilisation3">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="./index?action=pageUtilisation2" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

<?php 
$contenu = ob_get_clean(); 
require 'template.php';

