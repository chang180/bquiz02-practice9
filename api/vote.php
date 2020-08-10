<?php
include_once "../base.php";
$row=$Que->find($_POST['parent']);
$row['count']++;
$Que->save($row);
$row=$Que->find($_POST['vote']);
$row['count']++;
$Que->save($row);
to("../index.php?do=result&id=".$_POST['parent']);