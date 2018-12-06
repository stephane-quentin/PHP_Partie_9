<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Exercice 6 PHP Partie 9</title>
  </head>
  <body>
    <div class="jumbotron">
    <p><a href="http://monProjet" class="btn btn-danger">Accueil</a></p>
    <p>1ère méthode :</p>
    <?php
    $num = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
    echo $num; ?>
    <!-- cal_days_in_month — Retourne le nombre de jours dans un mois, pour une année et un calendrier donné -->
    <p>2ème méthode :</p>
    <?php
    $date = new DateTime('01-02-2016');
    $num = $date->format('t');
    echo $num;
    ?>
    <!-- paramètre de format : http://php.net/manual/fr/function.date.php -->
    <p>3ème méthode :</p>
    <?php
    $num = date('t', mktime (0, 0, 0, 2, 1, 2016));
    echo $num;
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
