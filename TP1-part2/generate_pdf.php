<?php

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $stages_formations = nl2br($_POST['stages_formations']);
    $competences = nl2br($_POST['competences']);
    $langues = nl2br($_POST['langues']);
    $centres_interets = nl2br($_POST['centres_interets']);
    $photo_nom = $_FILES['photo']['name']; //name of the pic

    require __DIR__ . "/dompdf/vendor/autoload.php";

    move_uploaded_file($_FILES['photo']['tmp_name'], __DIR__ . "/images/{$photo_nom}");

    $html = '
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #d9b3cc;
            color: #333;
            padding: 20px;
            font-size: 16px;
        }

        h1 span {
         
            text-align: center;
            font-size: 50px;
            color: black;
            margin-bottom: 20px;
            margin-top: 0px;
        }

        img {
            display: block;
            margin: 0 auto;
            margin-bottom: 0px;
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #731c53;
        }

        label {
            color: #b45c94;
            font-size: 18px;
            font-weight: bold;
        }

        span {
            font-size: 18px;
            font-weight: normal;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-heading {
            color: #731c53;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-content {
            margin-left: 20px;
        }
        .first{
          text-align: center;

        }
    </style>
    <div class = "first">
<img src="' . __DIR__ . '/images/' . $photo_nom . '">
    <h1> <span>' . $nom . '</span></h1>
    </div>

    <div class="section">
        <div class="section-heading">Contact</div>
        <div class="section-content">

            <label>Email: </label>
            <span>' . $email . '</span><br>

            <label>Phone Number: </label>
            <span>' . $phone . '</span>
        </div>
    </div>


    <div class="section">
        <div class="section-heading">Formations et Stages</div>
        <div class="section-content">
            <span>' . $stages_formations . '</span>
        </div>
    </div>

    <div class="section">
        <div class="section-heading">Compétence</div>
        <div class="section-content">
            <span>' . $competences . '</span>
        </div>
    </div>

    <div class="section">
        <div class="section-heading">Langues</div>
        <div class="section-content">
            <span>' . $langues . '</span>
        </div>
    </div>

    <div class="section">
        <div class="section-heading">Interets</div>
        <div class="section-content">
            <span>' . $centres_interets . '</span>
        </div>
    </div>
    ';

    $options = new Options;
    $options->setChroot(__DIR__);

    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);

    $dompdf->render();

    $dompdf->stream("myCV.pdf", ["Attachement" => 0]);
}
?>

