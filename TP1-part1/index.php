<?php
session_start();

$nom =
  $prenom =
  $age =
  $tel =
  $email =
  $filiere =
  $annee =
  $modules =
  $nb_projets =
  $liste_projets =
  $interets =
  $langues =
  $remarques =
  $fichier = '';

if (isset($_SESSION['modifier'])) {
  $nom = $_SESSION["nom"];
  $prenom = $_SESSION["prenom"];
  $age = $_SESSION["age"];
  $tel = $_SESSION["tel"];
  $email = $_SESSION["email"];
  $filiere = $_SESSION["filiere"];
  $annee = $_SESSION["annee"];
  $modules = $_SESSION["modules"];
  $nb_projets = $_SESSION["nb_projets"];
  $liste_projets = $_SESSION["liste_projets"];
  $interets = $_SESSION["interets"];
  $langues = $_SESSION["langues"];
  $remarques = $_SESSION["remarques"];
   $fichier = $_SESSION["fichier"];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulaire</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #d9b3cc;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
      color: #731c53;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
    }

    textarea.form-control {
      height: 110px;
      resize: vertical;
    }

    input[type="file"] {
      margin-bottom: 20px;
    }
    .btn-primary{
      background-color: #731c53;
      border-color: #731c53;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <form action="recap.php" method="POST" class="formulaire-form">

      <h2>Renseignements Personnels</h2>
      <div class="form-group">
        <label for="nom"> Nom : </label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom ?>" required></input>
      </div>

      <div class="form-group">
        <label for="prenom"> Prénom : </label>
        <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $prenom ?>" required></input>
      </div>

      <div class="form-group">
        <label for="age"> Age : </label>
        <input type="number" name="age" id="age" class="form-control" pattern="[0-9]+" min="1" max="120" value="<?php echo $age ?>" required></input>
      </div>

      <div class="form-group">
        <label for="tel"> Téléphone : </label>
        <input type="tel" name="tel" id="tel" class="form-control"  pattern="[0-9]{10}" value="<?php echo $tel ?>" required></input>
      </div>

      <div class="form-group">
        <label for="email"> Email : </label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ?>" required></input>
      </div>

      <br>
      <br>
      <h2>Renseignements Académiques</h2>
      <h5> Filière : </h5>
      <div class="form-group">
        <input id="2AP" type="radio" name="filiere" value="2AP" class="input" required></input>
        <label for="2AP"> 2AP </label>
        <input id="GSTR" type="radio" name="filiere" value="GSTR" class="input" required></input>
        <label for="GSTR"> GSTR </label>
        <input id="GI" type="radio" name="filiere" value="GI" class="input" required></input>
        <label for="GI"> GI </label>
        <input id="SCM" type="radio" name="filiere" value="SCM" class="input" required></input>
        <label for="SCM"> SCM </label>
        <input id="GC" type="radio" name="filiere" value="GC" class="input" required></input>
        <label for="GC"> GC </label>
        <input id="MS" type="radio" name="filiere" value="MS" class="input" required></input>
        <label for="MS"> MS </label>
      </div>

      <h5> Année scolaire : </h5>
      <div class="form-group">
        <input id="1" type="radio" name="annee" value="1" class="input" required></input>
        <label for="1"> 1er année </label>
        <input id="2" type="radio" name="annee" value="2" class="input" required></input>
        <label for="2"> 2ème année </label>
        <input id="3" type="radio" name="annee" value="3" class="input" required></input>
        <label for="3"> 3ème année </label>
      </div>

      <h5> Modules suivies cette année : </h5>
      <div class="form-group">
        <input id="pro av" type="checkbox" name="modules[]" value="pro av" class="input"></input>
        <label for="pro av"> Pro av </label>
        <input id="compilation" type="checkbox" name="modules[]" value="compilation" class="input"></input>
        <label for="compilation"> Compilation </label>
        <input id="reseaux av" type="checkbox" name="modules[]" value="reseaux av" class="input"></input>
        <label for="reseaux av"> Réseaux av </label>
        <input id="web avancee" type="checkbox" name="modules[]" value="web avancee" class="input"></input>
        <label for="web avancee"> Web avancée </label>
        <input id="poo" type="checkbox" name="modules[]" value="poo" class="input"></input>
        <label for="poo"> POO </label>
        <input id="bd" type="checkbox" name="modules[]" value="bd" class="input"></input>
        <label for="bd"> BD </label>
      </div>

      <br>
      <div class="form-group">
        <label for="nb_projets"> Nombre de projets réalisés cette année : </label>
        <input type="number" name="nb_projets" id="nb_projets" class="form-control" pattern="[0-9]+" min="1" max="100" value="<?php echo $nb_projets ?>" required></input>
      </div>

      <br>
      <br>
      <h2>Accomplissements et Compétences</h2>
      <div class="form-group">
        <label for="liste_projets"> La liste des projets réalisés : </label>
        <textarea name="liste_projets" id="liste_projets" class="form-control" required><?php echo $liste_projets ?></textarea>
      </div>

      <div class="form-group">
        <label for="interets"> Les centre d'intéret : </label>
        <textarea name="interets" id="centres_interet" class="form-control" required><?php echo $interets ?></textarea>
      </div>

      <div class="form-group">
        <label for="langues"> Les langues parlées : </label>
        <textarea name="langues" id="langues" class="form-control" required><?php echo $langues ?></textarea>
      </div>

      <br>
      <br>
      <h2>Vos remarques</h2>
      <div class="form-group">
        <textarea name="remarques" id="remarques" class="form-control"><?php echo $remarques ?></textarea>
        <p><?php echo $fichier?></p>
      </div>

      <input class="file" type="file" name="fichier" id="fichier" accept=".txt,.pdf,.docx"></input>

      <input type="hidden" name="sent" value="1"></input>

      <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Envoyer" />
        <input class="reset-btn btn btn-primary" type="reset" value="Réinitialiser" />
      </div>

    </form>
  </div>

  <script>
    'use strict';
    const checkedFiliere = document.getElementById('<?php echo $filiere ?>');
    const checkedAnnee = document.getElementById('<?php echo $annee ?>');
    const resetBtn = document.querySelector('.reset-btn');

    <?php if (isset($_SESSION)) : ?>
      document.getElementById('<?php echo $filiere ?>').setAttribute('checked', '');
      document.getElementById('<?php echo $annee ?>').setAttribute('checked', '');
      <?php foreach ($modules as $module) : ?>
        document.getElementById(`<?php echo $module ?>`).setAttribute('checked', '');
      <?php endforeach ?>

    <?php endif; ?>

    resetBtn.addEventListener('click', function() {
      <?php session_unset();
      $nom =
        $prenom =
        $age =
        $tel =
        $email =
        $filiere =
        $annee =
        $modules =
        $nb_projets =
        $liste_projets =
        $interets =
        $langues =
        $remarques =
        $fichier = '';
      ?>
      location.reload(true);
    })
  </script>
</body>

</html>