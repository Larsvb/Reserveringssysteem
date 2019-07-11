<?php

//Require DB settings with connection variable
require_once "database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM treatments";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$treatments = [];
while ($row = mysqli_fetch_assoc($result))
{
    $treatments[] = $row;
}

