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
    <script src="includes/main.js"></script>
</head>
<body>
    <?php include('./includes/header.php'); ?>
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
            <div class="blocks-container">
                <div class="block title">
                    <h3>Afspraakgegevens</h3>
                </div>
                <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">

                    <div class="data-field">
                        <div>
                            <label for="date1">Datum</label>
                            <input id="date1" type="date" name="date1" value="<?= (isset($date) ? $date : ''); ?>"/>
                        </div>
                        <div>
                            <label>Tijd</label>
                            <p>Van:<input type="time" name="time-start1" value="<?= (isset($startTime) ? $startTime : ''); ?>"/>
                               tot: <input type="time" name="time-end1" value="<?= (isset($endTime) ? $endTime : ''); ?>"/></p>
                        </div>
                    </div>

                    <div class="data-submit">
                        <input type="submit" name="submit-date" value="Save"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="row personal-info">
        <div class="full-row">
            <div class="blocks-container">



            </div>
        </div>
    </div>
    <div class="row">
        <div class="full-row">
            <div class="blocks-container">

            </div>
        </div>
    </div>
</body>
</html>