<?php

//Require DB settings with connection variable
require_once "database.php";

// check if de button with name "submit" in the from has been clicked and POST'ed
if (isset($_POST['submit']))
{
//  get value from input fields in index.php and set it as an variable to post it
    $treatment = mysqli_escape_string($db, $_POST['treatments']);
    $worker = mysqli_escape_string($db, $_POST['workers']);
    $firstname = mysqli_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_escape_string($db, $_POST['lastname']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $phone = mysqli_escape_string($db, $_POST['phone']);
    $birth = mysqli_escape_string($db, $_POST['birthdate']);

//  query that post the abovve made variables in the right table and fields in the database
    $query = " INSERT INTO appointments (treatment_id, account_id, firstname, lastname, email, phone, birthday)
              VALUES ( '$treatment', '$worker', '$firstname', '$lastname','$email', '$phone', '$birth')
              ";

    $result = mysqli_query($db, $query);
    $appointmentId = mysqli_insert_id($db);

    //get value from de input field in index.php and post it to the database
    $date = mysqli_escape_string($db, $_POST['date1']);
    $startTime = mysqli_escape_string($db, $_POST['time-start1']);
    $endTime = mysqli_escape_string($db, $_POST['time-end1']);

    $date2 = mysqli_escape_string($db, $_POST['date2']);
    $startTime2 = mysqli_escape_string($db, $_POST['time-start2']);
    $endTime2 = mysqli_escape_string($db, $_POST['time-end2']);

    $date3 = mysqli_escape_string($db, $_POST['date3']);
    $startTime3 = mysqli_escape_string($db, $_POST['time-start3']);
    $endTime3 = mysqli_escape_string($db, $_POST['time-end3']);

    //Check if data is valid & generate error if not so
    $errors = [];
    if ($date == "") {
        $errors[] = 'Datum kan niet leeg zijn';
    }
    if ($startTime == "") {
        $errors[] = '"Van" tijd kan niet leeg zijn';
    }
    if ($endTime == "") {
        $errors[] = '"Tot" tijd kan niet leeg zijn';
    }

    // check if there are no errors
    if (empty($errors))
    {
//        query that uses the above made variables about the dates and times to post it in the right table and field of the database
        $query = "
                  INSERT INTO suggestions (date, time_start, time_end, appointment_id)
                  VALUES ( '".DateTime::createFromFormat('d-m-Y', $date)->format('Y-m-d')."', '$startTime', '$endTime', '$appointmentId' ),
                         ( '".DateTime::createFromFormat('d-m-Y', $date2)->format('Y-m-d')."', '$startTime2', '$endTime2', '$appointmentId' ),
                         ( '".DateTime::createFromFormat('d-m-Y', $date3)->format('Y-m-d')."', '$startTime3', '$endTime3', '$appointmentId' )
                  ";

        $result = mysqli_query($db, $query);

//        sends the user after the query is succesfully done to the page succeeded.php
        header('location: succeeded.php');
    }
}
