<?php
require_once  "database.php";

$q = $_REQUEST['q'];
//echo "<option value=''>".$q."</option>";
if($q != "0")
{
    $query = "SELECT accounts.id, name 
          FROM accounts 
          INNER JOIN accounts_treatments 
            ON accounts.id = accounts_treatments.account_id
          WHERE treatment_id = $q";

    $result = mysqli_query($db, $query);
    $numRows = $result->num_rows;
    $datas = [];

    if($numRows > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $datas[] = $row;
        }
    }
    else
    {
        echo "<option value=''>Geen personen gevonden</option>";
    }

    foreach ($datas as $data)
    {
        echo "<option value='".$data['id']."'>".$data['name']."</option>";
    }
}
else
{
    echo "<option value=''>Kies eerst een behandeling</option>";
}

?>