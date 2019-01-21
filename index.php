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

    <header>
        <div class="row header">
            <div class="full-row">
                <div class="blocks-container">
                    <div class="logo link">
                        <a href="http://localhost/beautysalon/reserveringssysteem/index.php" ><h1>Beautysalon AnneFleur</h1></a>
                    </div>
                    <div class="media">
                        <ul>
                            <li class="social-media"><a href="https://instagram.com" class="link" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li class="social-media"><a href="https://facebook.com" class="link" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

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
                                <input id="date1" class="datepicker" type="text" name="date1" value="">
                            </div>
                            <div>
                                <label>Tijd</label>
                                <p>Van:<input id="starttime" type="time" name="time-start1" value=""/>
                                   tot: <input id="endtime" type="time" name="time-end1" value=""/></p>
                            </div>
                        </div>

                        <div class="data-field">
                            <div>
                                <label for="date2">Datum</label>
                                <input id="date2" class="datepicker" type="tex" name="date2" value=""/>
                            </div>
                            <div>
                                <label>Tijd</label>
                                <p>Van:<input id="starttime2" type="time" name="time-start2" value=""/>
                                    tot: <input id="endtime2" type="time" name="time-end2" value=""/></p>
                            </div>
                        </div>

                        <div class="data-field">
                            <div>
                                <label for="date3">Datum</label>
                                <input id="date3" class="datepicker" type="text" name="date3" value=""/>
                            </div>
                            <div>
                                <label>Tijd</label>
                                <p>Van:<input id="starttime3" type="time" name="time-start3" value=""/>
                                    tot: <input id="endtime3" type="time" name="time-end3" value=""/></p>
                            </div>
                        </div>

                        <div class="block title pink left-after">
                            <h3>Persoonsgegevens</h3>
                        </div>

                        <div class="data-field">
                            <div class="firstname">
                                <label>Voornaam</label>
                                <input id="firstname" type="text" name="firstname" value="">
                            </div>
                            <div class="lastname">
                                <label>Achternaam</label>
                                <input id="lastname" type="text" name="lastname" value="">
                            </div>
                        </div>

                        <div class="data-field">
                            <div class="emailinput"></div>
                                <label>E-mail</label>
                                <input id="email" type="email" name="email" value="">
                            </div>
                            <div class="phoneinput">
                                <label>Telefoonnummer</label>
                                <input id="phone" type="number" name="phone" value="">
                            </div>
                        </div>

                        <div class="data-field">
                            <label>Geboortedatum</label>
                            <input id="birthdate" type="date" name="birthdate" value="">
                        </div>

                        <div class="data-submit">
                            <input type="submit" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({
                beforeShowDay: $.datepicker.noWeekends,
                minDate: +3, maxDate: "+1M ",
                firstDay: 1,
                dateFormat: 'yy-mm-dd',
                changeYear: true,
            });
        } );
    </script>
    <script src="includes/main.js"></script>
</body>
</html>