<?php
require 'connection.php';
header("Content-Type: text/xml");

$expr = $dbh->prepare("SELECT ROUND(TIME_TO_SEC(timediff(a.time_end, a.time_start))/3600) AS diff 
        FROM work a JOIN projects b ON a.FID_Projects=b.ID_Projects WHERE b.name=:project_name");
$expr->execute(['project_name'=>$_GET["project_name"]]);
$res = $expr->fetchAll();
$dbh = null;

$total_time = 0;
foreach ($res as $num)
    $total_time+=$num[0];

echo '<?xml version="1.0" encoding="utf8" ?>';
?>

<duration> 
    <totalTime><?=$total_time?></totalTime>
</duration>