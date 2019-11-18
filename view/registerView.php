<?php 
// PAGE POUR S'INSCRIRE 
ob_start(); 
?>

<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <meta charset="utf-8">
  
  <!--Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
  <!--CCS Stylsheet-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./public/css/register.css">
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
</div>
</section>
<body>
  <section id="login">
    <div class="container-fluid">
      <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
          <div class="login d-flex align-items-center py-5">

            <!-- Demo content-->
            <div class="container">
              <div class="row">
                <div class="col-lg-10 col-xl-7 mx-auto">
                  <h3 class="display-4">Inscrivez-vous!</h3>
                  <p class="text-muted mb-4">Vos cours d'amphithéâtre ne seront plus les mêmes.</p>
                  <form>
                    <div class="form-group mb-3">
                      <input id="inputEmail" type="email" placeholder="Adresse e-mail" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                    <div class="form-group mb-3">
                      <input id="inputPassword" type="password" placeholder="Mot de passe" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                      <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                      <label for="customCheck1" class="custom-control-label">Remember password</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">S'inscrire</button>
                    <div class="text-center d-flex justify-content-between mt-4"><p>Déjà inscrit?<a href="./index.php?action=login" class="font-italic text-muted"> 
                      <u>Se connecter avec son compte</u></a></p></div>
                    </form>
                  </div>
                </div>
              </div><!-- End -->

            </div>
          </div><!-- End -->

        </div>
      </div>
    </section>
    <a id="back-to-top" href="#" class="btn btn-blue-gradient btn-lg back-to-top"role="button"><i class="fas fa-chevron-up"></i></a>

    <?php $contenu = ob_get_clean(); 
    require 'template.php';