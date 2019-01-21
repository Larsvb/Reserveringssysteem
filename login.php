<?php

session_start();
require_once "includes/database.php";

if (isset($_SESSION['loggedIn']))
{
    header("location: admin-index.php");
    exit;
}

if (isset($_POST['login']))
{
    $email = mysqli_escape_string($db, $_POST['login-email']);
    $password = $_POST['password'];

//   get password & email from db
    $query = "SELECT id, email, password 
                FROM accounts
                  WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

//    check if email & password exist in the database
    $errors = [];
    if($user)
    {

        //validate password
        if(password_verify($password, $user['password']))
        {

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

//Ben ik ingelogd?
if (isset($_SESSION['login']))
{
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
    <?php include('./includes/links.php'); ?>
    <title>Reserveringssysteem</title>
</head>
<body>
<?php include('./includes/header.php'); ?>
<div class="background">
    <div class="row">
        <div class="full-row">
            <div class="blocks-container">

                <div class="block title left-after">
                    <h2>Login</h2>
                </div>

                <?Php if(isset($errors) && !empty($errors)) { ?>
                    <ul class="errors">
                        <?php for ($i = 0; $i < count($errors); $i++) { ?>
                            <li><?= $errors[$i]; ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <form method="post" action="">
                    <div>
                        <label for="login-email">E-mailadres:</label>
                        <input id="login-email" type="email" name="login-email"/>
                    </div>
                    <div>
                        <label for="password">Wachtwoord:</label>
                        <input id="password" type="password" name="password"/>
                    </div>
                    <div>
                        <input id="submit" type="submit" name="login" value="login"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>