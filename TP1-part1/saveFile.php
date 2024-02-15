<?php
session_start();

function saveFile()
{
  $file = fopen($_SESSION["nom"] . " " . $_SESSION["prenom"] . ".txt", "w");
  $modulestxt = '';
  foreach ($_SESSION["modules"] as $module) {
    $modulestxt .= $module . " , ";
  };
  $txt = "info personnels" .
    "\r\n Nom : " . $_SESSION["nom"] .
    "\r\n Prénom : " . $_SESSION["prenom"] .
    "\r\n Age : " . $_SESSION["age"] .
    "\r\n Téléphone : " . $_SESSION["tel"] .
    "\r\n Email :" . $_SESSION["email"] .
    "\r\n\r\ninfo académiques" .
    "\r\n Filière : " . $_SESSION["filiere"] .
    "\r\n Année Scolaire : " . $_SESSION["annee"] .
    "\r\n Modules suivies : " .  $modulestxt .
    "\r\n Nombre de projets : " . $_SESSION["nb_projets"] .
    "\r\n\r\nCompétences" .
    "\r\n Liste des projets : " . $_SESSION["liste_projets"] .
    "\r\n Centres d'intérets : " . $_SESSION["interets"] .
    "\r\n Langues parlées : " . $_SESSION["langues"] .
    "\r\n\r\nRemarques" .
    "\r\n " . $_SESSION["remarques"].
      "\r\n\r\nFile name" .
   "\r\n " . $_SESSION["fichier"] ;
  fwrite($file, $txt);
  fclose($file);
}

saveFile();
