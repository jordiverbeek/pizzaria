<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>pizzaria</title>
</head>

<body>
    <?php
    try {
        $user = 'root';
        $pass = ''; 
        $dbh = new PDO('mysql:host=localhost;dbname=pizzeria', $user, $pass);
        foreach ($dbh->query('SELECT * from menu') as $row) {
            print_r($row);
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    include("header.php");

    ?>
    <main id="home-page">
        <div class="hero">

            <h1 class="h1">
                <a href="#"></a>
            </h1>

            <h2>

            </h2>
        </div>
        <div class="content">

        </div>
    </main>
    <footer>

    </footer>
</body>

</html>