<?php
include_once "../base.php";
switch($_POST['type']){
    case 1:
        $news=$News->find(['id'=>$_POST['id']]);
        $news['good']++;
        $News->save($news);
        $Log->save(['news'=>$_POST['id'],'user'=>$_POST['user']]);
    break;
    case 2:
        $news=$News->find(['id'=>$_POST['id']]);
        $news['good']--;
        $News->save($news);
        $Log->del(['news'=>$_POST['id'],'user'=>$_POST['user']]);
    break;
}