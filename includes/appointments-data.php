<?php
//Require DB settings with connection variable
require_once "database.php";
//Get the result set from the database with a SQL query
$query = "
         SELECT appointments.*, treatments.name AS treatment_name, accounts.name AS account_name
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
