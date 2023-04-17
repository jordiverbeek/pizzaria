<?php

session_start();

$error = NULL;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "Jordi" && $password == "123") {
        $_SESSION['name'] = $username;
    } else {
        $error = "<h4 style='color: red;'>wachtwoord verkeerd</h4>";
    }
}

if (isset($_SESSION['name']) && $_SESSION['name'] != "") {
    echo "Hoi ".$_SESSION['name'];
    header("Location: admin-panel.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>login</title>
</head>

<?php

include("header.php");

?>

<body>
    <div class="form">
        <form method="POST">
            <div class="login-page-text"> <p>Admin Panel</p> </div>
            <h3>Username:</h3><input typ="text" name="username">
            <h3>Password:</h3><input type="password" name="password">
            <?php echo $error; ?>
            <br>
            <button type="submit" name="login">Login</button>
            
        </form>
    </div>
</body>

</html>