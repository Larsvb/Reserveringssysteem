<?php

//start session
session_start();

//Require DB settings with connection variable
require_once "includes/database.php";

//check if the form from the login.php has been posted
if (isset($_POST['login']))
{
    
//    retrieve values from the login form and set as variables
    $email = mysqli_escape_string($db, htmlentities($_POST['login-email']));
    $password = mysqli_escape_string($db, htmlentities($_POST['password']));

//   get password & email from db
    $query = "SELECT id, email, login_pass 
                FROM accounts
                  WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

//    check if email & password exist in the database
    $errors = [];
    if($user)
    {
        //validate password
        if(password_verify($password, $user['login_pass']))
        {
            console.log("nummer 2");
            //set email for later use in Session
            $_SESSION['loggedIn'] = [
                'email' => $user['email'],
                'id' => $user['id']
            ];

            //Redirect to secure.php & exit script
            header("location: admin-index.php");
            exit;
        } else {
            $errors[] = 'Uw wachtwoord is onjuist';
        }
    } else {
        $errors[] = 'Uw email komt niet voor in de database';
    }
}

// ReCAPTCHAv3
define('SITE_KEY', '6LeTM60UAAAAAMw9TPK-znvv1ol2IXpXWne6lDFG');
define('SECRET_KEY', '6LeTM60UAAAAAC7gXpNBf3zbyNXsg9Ry2NnVMl1T');

if($_POST){
    function getCaptcha($SecretKey){
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}');
        $return = json_decode($response);
        return $return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    if($Return->success == true && $Return->score > 0.5){
        echo "succes!";
    }else {
        echo "You are a robot!!";
    }
}

//check if you are loged-in
if (isset($_SESSION['login']))
{
//    if you are logged in you wil get redirected to the admin-index.php
    header("location: admin-index.php");
    exit;
}
?>

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
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
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

    <div class="background"><!-- the div that is used to get the white background -->
        <div class="row"><!-- row  -->
            <div class="full-row"><!-- full-row that keeps the content centered and within the 1080px pixels-->
                <div class="blocks-container padding"><!-- container where al the content is been put in-->

                    <div class="block title margin left-after"><!-- the block where titles go in  -->
                        <h2>Login</h2>
                    </div>
                    <!-- retrieve errors if they occure-->
                    <?Php if(isset($errors) && !empty($errors)) { ?>
                        <ul class="errors">
                            <?php for ($i = 0; $i < count($errors); $i++) { ?>
                                <li><?= $errors[$i]; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>

                    <div class="login-container">
                        <form class="login" method="post" action=""> <!-- login form -->
                            <div>
                                <label for="login-email">E-mailadres:</label>
                                <input id="login-email" type="email" name="login-email"/>
                            </div>
                            <div>
                                <label for="password">Wachtwoord:</label>
                                <input id="password" type="password" name="password"/>
                            </div>
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <div class="button">
                                <button class="left-after" id="login-submit" type="submit" name="login" value="login"><h3>Login.</h3></button>
                            </div>
                        </form>
                        <script>
                            grecaptcha.ready(function() {
                                grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'})
                                .then(function(token) {
                                    // console.log(token);
                                    document.getElementById('g-recaptcha-response').value=token;
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>