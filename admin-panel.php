<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>Document</title>
</head>

<body class="body-admin">
    <div class="add-menu">
        <div class="overig"></div>
                <div class="toevoegen">
            <form method="POST">
                <h3>titel:</h3> <input typ="text" name="titel">
                <h3>omschrijving: </h3><input typ="text" name="omschrijving">
                <h3>prijs: </h3><input typ="text" name="prijs">
                <button type="submit" name="submitbutton">submit</button>                
            </form>
        </div>
        <?php
        
        include("header.php");

        include_once("config.php");
        
        if (isset($_POST['submitbutton'])) {

            $titel = $_POST['titel'];
            $prijs = $_POST['prijs'];
            $omschrijving = $_POST['omschrijving'];

            if ($titel == NULL) { $titel = 'test'; } 
            if ($prijs == NULL) { $prijs = '1'; } 
            if ($omschrijving == NULL) { $omschrijving = 'test'; }


            $stmt = $conn->prepare("INSERT INTO menu(naam, omschrijving, prijs) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $titel, $omschrijving, $prijs);
            $stmt->execute();

        }
        ?>



        <div class="table-edit-delete">
            <table>
                <tr class="table-header">
                    <th class="table-naam">naam</th>
                    <th class="table-naam">omschrijving</th>
                    <th class="table-prijs">prijs</th>
                    <th class="table-edit">edit</th>
                    <th class="table-delete">delete</th>
                </tr>

                <?php

                $stmt = $conn->prepare("SELECT * FROM menu");

                if ($stmt->execute()) {
                    $is_run = $stmt->get_result();
                    while ($result = mysqli_fetch_assoc($is_run)) {
                        echo '
                <tr>
                    <td class="table-naam">' . $result['naam'] . '</td>
                    <td class="table-naam">' . $result['omschrijving'] .  '</td>
                    <td class="table-prijs">€' . $result['prijs'] . '</td>
                    <td class="table-edit"><a class="edit-button" href="edit.php?id=' . $result['id'] . '">edit</a></td>
                    <td class="table-delete"><a class="delete-button" href="delete.php?id=' . $result['id'] . '">delete</a></td>
                </tr>

       
        </div>';
                    }
                } else {
                    echo  "Something happend :o";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>