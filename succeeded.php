<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--    get all the links that must be used from the file links.php in the map includes-->
    <?php include('./includes/links.php'); ?>
    <title>Reserveringssysteem</title>
</head>
<body>

    <!--The header for customers-->
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

    <div class="background"> <!-- the div that is used to get the white background -->
        <div class="row"> <!-- row  -->
            <div class="full-row"> <!-- full-row that keeps the content centered and within the 1080px pixels-->
                <div class="blocks-container slider succeeded"> <!-- container where al the content is been put in-->
                    <div class="slider-content center">
                        <div class="block title left-after"> <!-- the block where titles go in  -->
                            <h2>Bedankt!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row succes-page"> <!-- row  -->
            <div class="full-row"><!-- full-row that keeps the content centered and within the 1080px pixels-->
                <div class="blocks-container succes padding"> <!-- container where al the content is been put in-->
                    <div class="block title pink center"><!-- the block where titles go in  -->
                        <h2>Uw formulier is succesvol verzonden</h2>
                    </div>
                    <div class="block text center"> <!-- the block where texts goes in  -->
                        <p>U ontvangt z.s.m. een email met daarin de gekozen en bevestigde afspraak.</p>
                        <p>klik <a href="http://localhost/beautysalon/reserveringssysteem/index.php">hier</a> om terug te gaan naar de homepagina.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>