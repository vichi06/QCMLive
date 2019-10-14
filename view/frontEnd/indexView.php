<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>

  <!-- Title -->

  <div class="row">
    <div class="col-lg-6">
        <img class="title-image" src="./public/images/img0.png" alt="">
    </div>

    <div class="col-lg-6">
      <h1>Plus d'intéractivité avec vos étudiants grâce à qcm live</h1>
      <a href='./index.php?action=login'>
        <button type="button"  class="btn btn-dark btn-lg download-button" >
          <i class="fas fa-chalkboard-teacher"></i> Professeur
        </button>
      </a>
      <a href='./index.php?action=login'>
        <button type="button"  class="btn btn-outline-light btn-lg download-button">
          <i class="fas fa-user-graduate"></i></i> Elève
        </button>
      </a>
    </div>
  </div>


  </section>


  <!-- Features -->

  <section id="features">
    <div class="row">
      <div class="feature-box col-lg-4 col-md-12 col-sm-12">
        <i class="icon fas fa-check-circle fa-4x"> </i>
        <h3>Facile à utiliser. </h3>
        <p>Un outil à la portée de tous. </p>
      </div>
      <div class="feature-box col-lg-4 col-md-12 col-sm-12 ">
        <i class="icon fas fa-bullseye fa-4x"></i>
        <h3>Le meilleur sur le marché.</h3>
        <p>Pas plus rapide et ergonome.</p>
      </div>
      <div class="feature-box col-lg-4 col-md-12 col-sm-12">
        <i class="icon fas fa-heart fa-4x"></i>
        <h3>Codé avec attention.</h3>
        <p>Une équipe de développeurs passionnés.</p>
      </div>
    </div>
  </section>

<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>

  