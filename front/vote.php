<form action="api/vote.php" method="post">
    <fieldset>
        <?php
    $row=$Que->find(['id'=>$_GET['id']]);
    $parent=$row['id'];
        ?>
        <legend>目前位置：首頁 >問卷調查><?=$row['text'];?></legend>
        <h3><?=$row['text'];?></h3>
    <?php
    $opts=$Que->all(['parent'=>$parent]);
    foreach($opts as $o){
        ?>
        <input type="radio" name="vote" value="<?=$o['id'];?>"><?=$o['text'];?><br>
        <?php
    }
    ?>
    <input type="hidden" name="parent" value="<?=$parent;?>">
    <div class="ct"><button>我要投票</button></div>
    </fieldset>
</form>