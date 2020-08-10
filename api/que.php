<?php
include_once "../base.php";
$Que->save(['text'=>$_POST['que'],'parent'=>0]);
$parent=$Que->find(['text'=>$_POST['que']])['id'];
foreach($_POST['opt'] as $o){
    $Que->save(['parent'=>$parent,'text'=>$o]);
}
to("../admin.php?do=que");