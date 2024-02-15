<?php
session_start();

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$age = $_POST["age"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$filiere = $_POST["filiere"];
$annee = $_POST["annee"];
$modules = $_POST["modules"];
$nb_projets = $_POST["nb_projets"];
$liste_projets = $_POST["liste_projets"];
$interets = $_POST["interets"];
$langues = $_POST["langues"];
$remarques = $_POST["remarques"];
$fichier =  $_POST["fichier"];
$modifier = $_POST["sent"];

$_SESSION["nom"] = $nom;
$_SESSION["prenom"] = $prenom;
$_SESSION["age"] = $age;
$_SESSION["tel"] = $tel;
$_SESSION["email"] = $email;
$_SESSION["filiere"] = $filiere;
$_SESSION["annee"] = $annee;
$_SESSION["modules"] = $modules;
$_SESSION["nb_projets"] = $nb_projets;
$_SESSION["liste_projets"] = $liste_projets;
$_SESSION["interets"] = $interets;
$_SESSION["langues"] = $langues;
$_SESSION["remarques"] = $remarques;
$_SESSION["modifier"] = $modifier;
$_SESSION["fichier"] = $fichier;

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: lightgrey;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            
            margin-bottom: 20px;
           
           color : #4169e1 
        }

        label {
            font-weight: 700;
            color: #001;
            
        }

        .edit-btn {
            text-decoration: none;
            color: #29c493;
        }

        .btn-primary {
            margin-right: 20px;
            
        }
     

        .row {
            margin-bottom: 20px;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Informations personnels</h2>
                <div>
                    <label>Nom : </label>
                    <span><?php echo $nom ?></span>
                </div>

                <div>
                    <label>Prénom : </label>
                    <span><?php echo $prenom ?></span>
                </div>

                <div>
                    <label>Age : </label>
                    <span><?php echo $age ?></span>
                </div>

                <div>
                    <label>Numéro de Téléphone : </label>
                    <span><?php echo $tel ?></span>
                </div>

                <div>
                    <label>Email : </label>
                    <span><?php echo $email ?></span>
                </div>
            </div>

            <div class="col">
                <h2>Informations académiques</h2>
                <div>
                    <label>Filière : </label>
                    <span><?php echo $filiere ?></span>
                </div>

                <div>
                    <label>Année scolaire : </label>
                    <span><?php echo $annee ?></span>
                </div>

                <div>
                    <label>Modules suivis cette année : </label>
                    <span><?php foreach ($modules as $module) {
                                echo $module . '&nbsp;/&nbsp;';
                            } ?></span>
                </div>

                <div>
                    <label>Nombre de projets : </label>
                    <span><?php echo $nb_projets ?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2>Compétences</h2>
                <div>
                    <label>Liste des projets : </label>
                    <span><?php echo $liste_projets ?></span>
                </div>

                <div>
                    <label>Centres d'intérêts : </label>
                    <span><?php echo $interets ?></span>
                </div>

                <div>
                    <label>Langues : </label>
                    <span><?php echo $langues ?></span>
                </div>
            </div>

            <div class="col">
               
                <div>
                    <label>Réclamations : </label>
                    <span><?php echo $remarques ?></span>
                </div>

                <div>
                    <label>Fichier : </label>
                    <p><?php echo $fichier ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <a class="edit-btn" href="index.php"><button class="btn btn-primary">Modifier</button></a>
                <button class="btn btn-primary" onclick="saveFile()">Enregistrer</button>
            </div>
        </div>
    </div>
</body>



<script>
    function saveFile() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "saveFile.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send();
        Swal.fire({
            title: "Tout est terminé !",
            text: "Les informations ont été sauvegardées avec succès.",
            icon: "success"
        })
    }
    
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
