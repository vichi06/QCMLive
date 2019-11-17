<!-- TEMPLATE -->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8"/>
  
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/mdb.min.css">
    <link rel="stylesheet" href="./public/css/backToTop.css" />
    
    <!-- SCRIPTS -->
    <script src="./public/js/app.js">
    <title> <?= $title ?> </title>   <!-- Élément spécifique -->
  </head>
  
  <body>
    <div id="global">
      <header>
        <?php require ("header.php") ?>
        </div>
       </header>
      <div id="contenu"> 
        <?= $contenu ?>   <!-- Élément spécifique -->

      </div>
      <a id="back-to-top" href="#" class="btn btn-blue-gradient btn-lg back-to-top"role="button"><i class="fas fa-chevron-up"></i></a>
      <footer id="piedBlog">
        <?php require "footer.php" ?>
      </footer>
    </div> <!-- #global -->
  </body>
</html>