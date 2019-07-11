<?php
//Require DB settings with connection variable
require_once "database.php";

//  query where al data from the table appointments gets retrieved and where the table treatments and accounts
// gets connected to the appointments table... this is to get the treatments and the name of the workers in the form to choose from.
$query = "
         SELECT appointments.*, appointments.id AS appoint_id, treatments.name AS treatment_name, accounts.name AS account_name 
            FROM appointments
                LEFT JOIN treatments ON appointments.treatment_id = treatments.id
                LEFT JOIN accounts ON appointments.account_id = accounts.id
        ";

$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$appointments = [];
while ($row = mysqli_fetch_assoc($result))
{
    $appointments[] = $row;

}

//  query where the suggestions gets connected with the appointments table so the right suggestions get put under the right appointment in admin-index.php
$suggestionQuery =  "SELECT appointments.*,
                         suggestions.id AS sugg_id,
                         suggestions.date AS suggestion_date,
                         suggestions.time_start AS start_time,
                         suggestions.time_end AS end_time,
                         suggestions.appointment_id AS appointment_id
                        FROM appointments
                          LEFT JOIN suggestions ON appointments.id = suggestions.appointment_id
                    ";

$suggestionResult = mysqli_query($db, $suggestionQuery);

//Loop through the result to create a custom array
$suggestions = [];
while ($row = mysqli_fetch_assoc($suggestionResult))
{
    $suggestions[] = $row;

}

// check if the buttons from the suggestions has been clicked/posted, if it is clicked/posted then execute the query
if (isset($_POST['select']))
{
//    retrieve the appointment id & suggestion id and set them as a variable
    $selectId = mysqli_escape_string($db, $_POST['suggestion-id']);
    $appId = mysqli_escape_string($db, $_POST['appointment-id']);

//    query that updates the suggestion_id in the appointments table to the selected suggestion with that id
    $selectQuery = "UPDATE appointments SET suggestion_id = '$selectId' WHERE appointments.id = '$appId'";

//    check if the query works
    if(mysqli_query($db, $selectQuery))
    {
//        query that deletes the other 2 not selected suggestions from the suggestion table
        $deleteQuery = "DELETE FROM suggestions WHERE appointment_id = '$appId' AND id != '$selectId' ";
        mysqli_query($db, $deleteQuery);
    }

//    header("location: appointment-edit.php");

}

