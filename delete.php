<?php
    require_once("header.php");
    require_once("config.php");
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ? ");
    $stmt->execute([$_GET['id']]);
    
    header("Location: admin-panel.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>Verwijderen</title>
</head>



