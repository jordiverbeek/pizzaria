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

<body>
    <?php

    include("header.php");

    ?>
    <main>
        <div class="menu-container">
            <?php
            
                require_once("config.php");

                $stmt = $conn->prepare("SELECT * FROM menu2");
                if ($stmt->execute()) {
                    $is_run = $stmt->get_result();
                    while ($result = mysqli_fetch_assoc($is_run)) {
                        echo '<div class="test">';
                        echo    '<h2>'.$result['id'].'</h2>';
                        echo    '<p>'.$result['naam'].'</p>';
                        echo '</div>';
                    }
                } else { echo  "Something happend :o"; }

            ?>
        </div>
        <footer>

        </footer>   
</body>

</html>