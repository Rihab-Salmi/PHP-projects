<?php
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL); 
}

function readEmailsFromFile($filename) {
    $emails = file($filename, FILE_IGNORE_NEW_LINES);
    return $emails;
}

function writeEmailsToFile($filename, $emails) {
    file_put_contents($filename, implode("\n", $emails));
}

function countEmailFrequency($emails) {
    $frequency = array_count_values($emails);
    return $frequency;
}

function removeInvalidEmails($emails) {
    $validEmails = array();
    $invalidEmails = array();

    foreach ($emails as $email) {
        if (isValidEmail($email)) {
            $validEmails[] = $email;
        } else {
            $invalidEmails[] = $email;
        }
    }
    file_put_contents('adressesNonValides.txt', implode("\n", $invalidEmails));

    return $validEmails;
}

function removeDuplicates($newEmails, $existingEmails) {
    $allEmails = array_merge($existingEmails, $newEmails);
    $uniqueEmails = array_unique($allEmails);
    return $uniqueEmails;
}

$validNewEmails = isset($_POST['email']) ? array_filter($_POST['email'], 'isValidEmail') : [];
$existingEmails = readEmailsFromFile('Emails.txt');
$validExistingEmails = removeInvalidEmails($existingEmails); 
$emailFrequency = countEmailFrequency($existingEmails); 

$uniqueValidEmails = removeDuplicates($validNewEmails, $validExistingEmails);

writeEmailsToFile('Emails.txt', $uniqueValidEmails);

sort($uniqueValidEmails);
writeEmailsToFile('EmailsT.txt', $uniqueValidEmails);

?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="email"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .form-container {
        width: 300px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }

</style>

<div class="form-container">
    <form method="post" action="">
        <label for="email">Ajouter une adresse email :</label>
        <input type="email" id="email" name="email[]" required>
        <button type="submit">Ajouter</button>
    </form>
</div>

<?php
echo "<table border='1'>";
echo "<tr><th>Email</th><th>Fréquence</th></tr>";
foreach ($uniqueValidEmails as $email) {
    $frequency = isset($emailFrequency[$email]) ? $emailFrequency[$email] : 0;
    if (in_array($email, $validNewEmails)) {
        $frequency++;
    }
    echo "<tr><td>$email</td><td>$frequency</td></tr>";
}
echo "</table>";
?>
