<?php
require 'connection.php';

$expr = $dbh->prepare("SELECT a.* FROM work a JOIN projects b ON a.FID_Projects=b.ID_Projects 
        WHERE b.name=:project_name AND a.date<=:work_date");
$expr->execute(['project_name'=>$_GET["projectName2"], 'work_date'=>$_GET["date"]]);
$res = $expr->fetchAll();
$dbh = null;

echo "Информация о выполненных задачах по проекту ".$_GET["projectName2"]. " на дату ".$_GET["date"].":";
echo "<p><table border='1'>
<tr>
    <th>FID_Worker</th>
    <th>FID_Projects</th>
    <th>date</th>
    <th>time_start</th>
    <th>time_end</th>
    <th>description</th>
</tr>";
foreach ($res as $row){
    echo "<tr>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "<td>".$row[5]."</td>";
    echo "</tr>";
}
echo "</table></p>";
?>