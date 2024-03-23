<?php


if (isset($_POST['create'])) {
    $dmnd = date('D-m-y H:i:s');
    $DB = DB::connect();
    $query = "INSERT INTO rdv('Date_dmd') VALUE ($dmnd)";
    $stmt = $DB->prepare($query);
    $stmt->execute();
}


?>