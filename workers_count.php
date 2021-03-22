<?php
require 'connection.php';
header("Content-Type: application/json");

$expr = $dbh->prepare("SELECT COUNT(a.ID_Worker) FROM worker a JOIN department b 
        ON a.FID_Department=b.ID_Department WHERE b.chief=:chief_name");
$expr->execute(['chief_name'=>$_GET["chiefName"]]);
$workers_number = $expr->fetch();
$dbh = null;

echo(json_encode($workers_number));
?>