<?php

require_once("config.php");

$stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

$run = $stmt->get_result();
$result = mysqli_fetch_assoc($run);
$oude_prijs = $result['prijs'];
$oude_titel = $result['naam'];
$oude_omschrijving = $result['omschrijving'];


if(isset($_POST['wijzig_button'])){
    $omschrijving = $_POST['omschrijving'];
    $titel = $_POST['titel'];
    $prijs = $_POST['prijs'];

    $stmt = $conn->prepare("UPDATE menu SET omschrijving = ?, naam = ?, prijs = ? WHERE id = ?");
    $stmt->bind_param("ssii", $omschrijving, $titel, $prijs, $_GET['id']);
    $stmt->execute();

    header('Location: admin-panel.php');
    exit;
}


require_once("header.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <div class="edit-form-container">
        <form method="POST">
            <?php 
                echo '
                <h3>titel:</h3> <input typ="text" name="titel" value="'.$oude_titel.'">
                <h3>omschrijving: </h3><input typ="text" name="omschrijving"  value="'.$oude_omschrijving.'">
                <h3>prijs: </h3><input typ="text" name="prijs" value="'.$oude_prijs.'">
                <button type="submit" name="wijzig_button">submit</button>
                ';
            ?>
        </form>
    </div>
</body>

</html>