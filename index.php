<?php

require_once "includes/treatments-data.php";
require_once "includes/query.php";

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
                <div class="blocks-container slider">
                    <div class="slider-content">
                        <div class="block image">
                            <img src="./images/pf.jpg">
                        </div>
                        <div class="text">
                            <div class="block title">
                                <h2>WELKOM.</h2>
                            </div>
                            <div class="block text">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    vulputate eget, arcu. In enim justo,<br>
                                    rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row appointment-info">
            <div class="full-row">
                <div class="blocks-container padding">
                    <div class="block title pink left-after">
                        <h3>Afspraakgegevens</h3>
                    </div>

                    <?php if (isset($errors)) { ?>
                        <ul class="errors">
                            <?php foreach ($errors as $error) { ?>
                                <li><?= $error; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <form action="" method="post">
                        <div class="treatmentworker">
                            <label>Behandeling</label>
                            <select name="treatments" id="treatments">
                                <option value="0">Kies een behandeling</option>
                                <?php foreach ($treatments as $treatment) { ?>
                                    <option value="<?= $treatment['id']; ?>">
                                        <?= $treatment['name']; ?> €<?= $treatment['price']; ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <label>Medewerker</label>
                            <select name="workers" id="workers">
                                <option value="0">Kies eerst een behandeling.</option>
                            </select>
                        </div>

                        <div class="data-field">
                            <div>
                                <label for="date1">Datum</label>
                                <input id="date1" type="date" name="date1" value="<?= (isset($date) ? $date : ''); ?>"/>
                            </div>
                            <div>
                                <label>Tijd</label>
                                <p>Van:<input id="starttime" type="time" name="time-start1" value="<?= (isset($startTime) ? $startTime : ''); ?>"/>
                                   tot: <input id="endtime" type="time" name="time-end1" value="<?= (isset($endTime) ? $endTime : ''); ?>"/></p>
                            </div>
                        </div>

                        <div class="data-field">
                            <div>
                                <label for="date2">Datum</label>
                                <input id="date2" type="date" name="date2" value="<?= (isset($date2) ? $date2 : ''); ?>"/>
                            </div>
                            <div>
                                <label>Tijd</label>
                                <p>Van:<input id="starttime2" type="time" name="time-start2" value="<?= (isset($startTime2) ? $startTime2 : ''); ?>"/>
                                    tot: <input id="endtime2" type="time" name="time-end2" value="<?= (isset($endTime2) ? $endTime2 : ''); ?>"/></p>
                            </div>
                        </div>

                        <div class="data-field">
                            <div>
                                <label for="date3">Datum</label>
                                <input id="date3" type="date" name="date3" value="<?= (isset($date3) ? $date3 : ''); ?>"/>
                            </div>
                            <div>
                                <label>Tijd</label>
                                <p>Van:<input id="starttime3" type="time" name="time-start3" value="<?= (isset($startTime3) ? $startTime3 : ''); ?>"/>
                                    tot: <input id="endtime3" type="time" name="time-end3" value="<?= (isset($endTime3) ? $endTime3 : ''); ?>"/></p>
                            </div>
                        </div>

                        <div class="block title pink left-after">
                            <h3>Persoonsgegevens</h3>
                        </div>

                        <div class="data-field">
                            <div class="firstname">
                                <label>Voornaam</label>
                                <input id="firstname" type="text" name="firstname" value="<?= (isset($firstname) ? $firstname : ''); ?>">
                            </div>
                            <div class="lastname">
                                <label>Achternaam</label>
                                <input id="lastname" type="text" name="lastname" value="<?= (isset($lastname) ? $lastname : ''); ?>">
                            </div>
                        </div>

                        <div class="data-field">
                            <div class="emailinput"></div>
                                <label>E-mail</label>
                                <input id="email" type="email" name="email" value="<?= (isset($email) ? $email : ''); ?>">
                            </div>
                            <div class="phoneinput">
                                <label>Telefoonnummer</label>
                                <input id="phone" type="number" name="phone" value="<?= (isset($phone) ? $phone : ''); ?>">
                            </div>
                        </div>

                        <div class="data-field">
                            <label>Geboortedatum</label>
                            <input id="birthdate" type="date" name="birthdate" value="<?= (isset($birth) ? $birth : ''); ?>">
                        </div>

                        <div class="data-submit">
                            <input type="submit" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="includes/main.js"></script>
</body>
</html>