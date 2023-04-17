<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/responsive.css">
    <title>pizzaria</title>
</head>

<body class="body-menu">

    <?php

    include("header.php");

    ?>
    <main>
        <div class="menu-container">
            <h2 class="de-menu-kaart">De Menu-kaart</h2>

            <div class="zoekveld">
                <form method="POST">
                    <input type="text" name="zoekveld" placeholder="Zoeken...">               
                </form>
            </div>
            <div class="menu-kaart-container">
                <?php
                require_once("config.php");
                if (isset($_POST['zoekveld'])) {
                    $stmt = $conn->prepare("SELECT * FROM menu WHERE naam LIKE ?");   
                    $zoeken = "%" . $_POST['zoekveld'] . "%";
                    $stmt->bind_param("s", $zoeken );
                } else {
                    $stmt = $conn->prepare("SELECT * FROM menu");
                }
                if ($stmt->execute()) {
                    $is_run = $stmt->get_result();
                    while ($result = mysqli_fetch_assoc($is_run)) {
                        echo '<div class="menu-kaart">
                        <div class="menu-kaart-naam">
                        <p>' . $result['naam'] . '</p>
                        </div>
                        <div class="menu-kaart-omschrijving">
                        <p>' . $result['omschrijving'] .  '</p>
                        </div>
                        <div class="menu-kaart-prijs">
                        <h3>€' . $result['prijs'] . '</h3>
                        </div>  
                    </div>';
                    }
                } else {
                    echo  "Something happend :o";
                }
                ?>
            </div>
        </div>
        <footer>

        </footer>
</body>

</html>