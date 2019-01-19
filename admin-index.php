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
    <?php include('./includes/header.php'); ?>
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
                            <?= $appointment['id']; ?>
                            <?= $appointment['firstname']; ?>
                            <?= $appointment['lastname']; ?>
                            <?= $appointment['email']; ?>
                            <?= $appointment['phone']; ?>
                            <?= $appointment['birthday']; ?>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>