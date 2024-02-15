<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV generator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
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
    </style>
</head>

<body>
    <h2>CV generator</h2>
    <form method="post" action="generate_pdf.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" class="form-control" required pattern="[0-9]{10}">

        </div>

        <div class="form-group">
            <label for="stages_formations">Stages et formations:</label>
            <textarea id="stages_formations" name="stages_formations" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="competences">Compétences:</label>
            <textarea id="competences" name="competences" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="langues">Langues:</label>
            <textarea id="langues" name="langues" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="centres_interets">Centres d'intérêts:</label>
            <textarea id="centres_interets" name="centres_interets" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" class="form-control-file" accept=".png,.jpeg,.jpg" required>
        </div>

        <button type="submit" class="btn btn-primary">Générer CV</button>
    </form>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>