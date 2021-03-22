<?php require 'connection.php'; ?>
<!DOCKTYPE HTML>
<html>
<head>
    <title>Лаба 7</title>
    <meta charset="utf-8">
    <script src="ajax.js"></script>
</head>
<body>
    <?php  
        $expr = $dbh->prepare("SELECT chief FROM department");
        $expr->execute();
        $chief_options = $expr->fetchAll();

        $expr = $dbh->prepare("SELECT projects.name FROM projects");
        $expr->execute();
        $project_options = $expr->fetchAll();  

        $dbh = null;
    ?>

    <p>Число сотрудников отдела выбранного руководителя:</p>
    <select id="chief">
        <?php foreach ($chief_options as $name): ?>
            <option value="<?=$name["chief"]?>"><?=$name["chief"]?></option>
        <?php endforeach ?>
    </select>	
    <p><input class="input" type="button" value="submit" onclick="workersCount()"></p>
	<div id= "placeholder-workers-count"></div> 

    <p>Oбщее время работы над выбранным проектом:</p>
    <select id="project_name">
        <?php foreach ($project_options as $project): ?>
            <option value="<?=$project["name"]?>"><?=$project["name"]?></option>
        <?php endforeach ?>
    </select>
    <p><input class="input" type="button" value="submit" onclick="workDuration()"></p>
	<div id= "placeholder-work-duration"></div> 

    <p>Информация о выполненных задачах по выбранному проекту на указанную дату:</p>
    <select id="project_name2">
        <?php foreach ($project_options as $project): ?>
            <option value="<?=$project["name"]?>"><?=$project["name"]?></option>
        <?php endforeach ?>
    </select>
    <p><input type="date" id="date"></p>
    <p><input class="input" type="button" value="submit" onclick="taskInfo()"></p>
	<div id= "placeholder-tasks-info"></div> 
</body>

