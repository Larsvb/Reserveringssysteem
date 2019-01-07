<?php

require_once "database.php";

if (isset($_POST['submit-date'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $date = mysqli_escape_string($db, $_POST['date1']);
    $startTime = mysqli_escape_string($db, $_POST['time-start1']);
    $endTime = mysqli_escape_string($db, $_POST['time-end1']);

    //Check if data is valid & generate error if not so
    $errors = [];
    if ($date == "") {
    $errors[] = 'Datum kan niet leeg zijn';
    }
    if ($startTime == "") {
    $errors[] = 'Van tijd kan niet leeg zijn';
    }
    if ($endTime == "") {
    $errors[] = 'Tot tijd kan niet leeg zijn';
    }

    if (empty($errors)) {
    $query = "INSERT INTO suggestions (date, time_start, time_end)
    VALUES ( '$date', '$startTime', '$endTime')";

        $result = mysqli_query($db, $query);

        if ($result){
        $date = '';
        $startTime = '';
        $endTime = '';
        $success = true;
        } else {

        }


    }
}
?>