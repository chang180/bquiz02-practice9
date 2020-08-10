    <fieldset>
        <?php
    $row=$Que->find(['id'=>$_GET['id']]);
    $parent=$row['id'];
    $total=($row['count']==0)?1:$row['count'];
        ?>
        <legend>目前位置：首頁 >問卷調查><?=$row['text'];?></legend>
        <h3><?=$row['text'];?></h3>
    <?php
    $opts=$Que->all(['parent'=>$parent]);
    foreach($opts as $o){
$rate=$o['count']/$total;
        ?>
       <div style="display:flex">
<div style="width:30%"><?=$o['text'];?></div>
<div style="width:<?=round(55*$rate);?>%;background:#ccc">&nbsp;</div>
<div><?=$o['count'];?>票(<?=round(100*$rate);?>%)</div>
       </div><br>
        <?php
    }
    ?>
    <input type="hidden" name="parent" value="<?=$parent;?>">
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
    </fieldset>