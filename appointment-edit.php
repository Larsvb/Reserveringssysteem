<?php

require_once "includes/appointments-data.php";

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
                <form action="" method="post" class="logout">
                    <button type="submit" name="logout" id="logout-button">Log uit.</button>
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
                <form action="" method="post">
                    <div class="data-field">
                        <label for="Naam">Naam</label>
                        <input id="succes-name" type="text" name="succes-name" value="<?= $appointment['firstname'] ." ". $appointment['lastname']; ?>"/>
                    </div>

                    <div class="data-field">
                        <label for="succes-email">E-mail</label>
                        <input id="succes-email" type="text" name="succes-email" value="<?= $appointment['email']; ?>"/>
                    </div>
                    <div class="data-field">
                        <label for="succes-phone">Telefoonnummer</label>
                        <input id="succes-phone" type="text" name="succes-phone" value="<?= $appointment['phone']; ?>"/>
                    </div>

                    <div class="data-submit">
                        <input type="hidden" name="id" value="<?= $albumId; ?>"/>
                        <input type="submit" value="Save"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>