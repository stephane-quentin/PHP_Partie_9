<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Exercice 9 TP PHP Partie 9</title>
</head>
<body>
  <div class="jumbotron">
    <p><a href="http://monProjet" class="btn btn-danger">Accueil</a></p>
    <form method="post">
      <p>
      <select name="month">
        <!-- création d'un tableau associatif avec les mois et leur numéro respectif dans l'ordre (utile pour la fonction cal_days_in_month) -->
        <?php
        $months = [
          1 => 'Janvier',
          2 => 'Février',
          3 => 'Mars',
          4 => 'Avril',
          5 => 'Mai',
          6 => 'Juin',
          7 => 'Juillet',
          8 => 'Août',
          9 => 'Septembre',
          10 => 'Octobre',
          11 => 'Novembre',
          12 => 'Décembre'];
        ?>
        <option selected disabled>Mois</option>
        <?php
        foreach ($months as $number => $month){
        ?>
        <!-- Affichage du tableau associatif grace à une boucle en mettant dans le value la clef, et ce qui est affiché dans la liste déroulnte le mois
        On met selected pour le mois choisi-->
          <option value="<?= $number; ?>" <?php if (isset($_POST['month']) && $_POST['month'] == $number) { echo 'selected'; } ?>><?= $month; ?></option>
        <?php
          }
        ?>
      </select>
      <select name="year">
        <option selected disabled>Année</option>
      <?php
        for ($year = 1970; $year <= 2050 ; $year++){
      ?>
        <!-- Nouvelle boucle pour afficher les années de 1970 à 2050
        On met selected pour l'année déjà choisie -->
        <option value="<?= $year; ?>" <?php if (isset($_POST['year']) && $_POST['year'] == $year) { echo 'selected'; } ?>><?= $year; ?></option>
      <?php
        }
      ?>
      </select>
      <input type="submit" name="submit" value="OK" class="btn btn-primary"/></p>
    </form>
    <!-- Initialisation de multiple variables :
    $monthNumber pour le numéro du mois
    $month pour avoir le mois en question
    $nbdays qui récupére le nombre de jours qu'à le mois en question en rapport avec l'année
    $firstDay qui récupére le premier jour du fameux mois
    Et condition valable quand on appuie sur le bouton et si un mois et une année sont choisis-->
    <?php
    if(isset($_POST['submit']) && isset($_POST['month']) && isset($_POST['year'])){
      $monthNumber = $_POST['month'];
      $month = $months[$monthNumber];
      $year = $_POST['year'];
      $nbdays = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);
      $jd = gregoriantojd($monthNumber, 1, $year);
      $firstDay = jddayofweek($jd, 0);
    ?>
    <table class="table table-dark table-bordered">
      <caption class="text-uppercase font-weight-bold text-success display-3"><?= $month . ' ' . $year ?></caption>
      <thead>
        <th class="bg-primary text-center" width=14%>Lundi</th>
        <th class="bg-primary text-center" width=14%>Mardi</th>
        <th class="bg-primary text-center" width=14%>Mercredi</th>
        <th class="bg-primary text-center" width=14%>Jeudi</th>
        <th class="bg-primary text-center" width=14%>Vendredi</th>
        <th class="bg-primary text-center" width=14%>Samedi</th>
        <th class="bg-primary text-center" width=14%>Dimanche</th>
      </thead>
      <tbody>
        <!-- Début du corps du tableau, ouverture de ligne -->
        <tr>
        <!-- 0 correspond au dimanche donc pour une plus simple compréhension, je le mets à 7,
        lundi étant 1 et dimanche le dernier jour de la semaine le 7 -->
        <?php
        if ($firstDay == 0) {
          $firstDay = 7;
        }
        for ($emptyBox = 1; $emptyBox < $firstDay; $emptyBox++) {
          ?>
          <!-- Boucle pour mettre des cases vides jusqu'au premier jour du mois -->
          <td height=100px></td>
          <?php
        }
        for ($day = 1; $day <= $nbdays; $day++){
          ?>
          <!-- Et boucle qui va du premier jour au dernier jour du mois -->
          <!-- Affichage du numéro du jour dans une case -->
          <td class="bg-light text-dark" height=100px><?= $day; ?></td>
          <!-- vérification de chaque jour pour savoir si c'est un dimanche -->
          <?php
          $jd = gregoriantojd($monthNumber, $day, $year);
          $today = jddayofweek($jd, 0);
          if ($day == $nbdays){
            ?>
            <!-- si fin de mois, on ferme la ligne-->
            </tr>
          <?php
          }
          elseif ($today == 0){
            ?>
            <!-- sinon si dimanche, fermeture de ligne et ouverture d'une autre -->
            </tr>
            <tr>
          <?php
          }
        }
        ?>
      </tbody>
    </table>
    <?php
  } else {
    echo 'Choisissez un mois et une année';
  }
    ?>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
