<?php

require_once "includes/appointments-data.php";

if(isset($_POST['logout'])) {
    unset($_SESSION['loggedIn']);
    header("location: login.php");
}


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

                <div class="appointments">
                    <?php foreach ($appointments as $appointment) { ?>
                        <div class="appointment">
                            <div class="data">
                                <div class="appoint-data"><?= $appointment['treatment_name']; ?></div>
                                <div class="appoint-data"><?= $appointment['account_name']; ?></div>
                                <div class="appoint-data"><?= $appointment['firstname']; ?>
                                                          <?= $appointment['lastname']; ?></div>
                                <div class="appoint-data"><?= $appointment['email']; ?></div>
                                <div class="appoint-data"><?= $appointment['phone']; ?></div>
                                <div class="appoint-data"><?= $appointment['birthday']; ?></div>
                            </div>

                            <div class="suggestion-list">
                                <?php foreach ($suggestions as $suggestion) { ?>
                                    <?php if($suggestion['id'] == $appointment['id']) { ?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="suggestion-id" value="<?= $suggestion['sugg_id']; ?>">
                                            <input type="hidden" name="appointment-id" value="<?= $suggestion['appointment_id']; ?>">
                                            <?= $suggestion['sugg_id'] ?>
                                            <?= $suggestion['suggestion_date']; ?>
                                            <?= $suggestion['start_time']; ?>
                                            <?= $suggestion['end_time']; ?>
                                                <button name="select" type="submit">Kies</button>
                                                <?= $appointment['id']; ?>
                                        </form>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>