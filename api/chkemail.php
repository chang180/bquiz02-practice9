<?php
include_once "../base.php";
$acc=$Admin->find(['email'=>$_GET['email']]);
if(!empty($acc)){
    echo "您的密碼為：".$acc['pw'];
}else{
    echo "查無此資料";
}