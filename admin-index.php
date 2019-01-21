<?php

session_start();
require_once "includes/appointments-data.php";

//mag ik deze pagina bezoeken?
if (!isset($_SESSION['loggedIn']))
{
    header("location: login.php");
    exit;
}

$email = $_SESSION['loggedIn'];


?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('./includes/links.php'); ?>
    <title>Reserveringssysteem</title>
</head>

<body>

<header>
    <div class="row header">
        <div class="full-row">
            <div class="blocks-container">
                <div class="logo link">
                    <a href="http://localhost/beautysalon/reserveringssysteem/index.php" ><h1>Beautysalon AnneFleur</h1></a>
                </div>
                <form class="logout">
                    <button type="submit" name="logout" id="logout-button"></button>
                </form>
            </div>
        </div>
    </div>
</header>

<div class="background">
    <div class="row">
        <div class="full-row">
            <div class="blocks-container padding">
                <div class="block title pink">
                    <h2>Afspraken.</h2>
                </div>

                <div class="appointments">
                    <?php foreach ($appointments as $appointment) { ?>

                        <div class="appointment">
                            <?= $appointment['treatment_name']; ?>
                            <?= $appointment['account_name']; ?>
                            <?= $appointment['firstname']; ?>
                            <?= $appointment['lastname']; ?>
                            <?= $appointment['email']; ?>
                            <?= $appointment['phone']; ?>
                            <?= $appointment['birthday']; ?>

                        </div>
                        <div>
                            <?= $appointment['suggestion_date']; ?>
                        </div><br><br><br>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>