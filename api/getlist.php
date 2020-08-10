<?php
include_once "../base.php";
$rows=$News->all(['type'=>$_GET['list']]);
foreach ($rows as $row){
    echo "<a href='#' onclick='getPost(".$row['id'].")'>".$row['title']."</a><br>";
}