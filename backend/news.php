    <form action="api/editnews.php" method="post">
        <table>
            <tr>
                <td width="15%">編號</td>
                <td width="55%">標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
            $total = $News->count(['sh' => 1]);
            $div = 3;
            $now = $_GET['p'] ?? "1";
            $start = ($now - 1) * $div;
    $pages=ceil($total/$div);
    $prev=(($now-1)>0)?($now-1):1;
    $next=(($now+1)<=$pages)?($now+1):$pages;
            $news = $News->all([], " LIMIT $start,$div");
            foreach ($news as $n) {
            ?>
                <tr>
                    <td><?= ($start+1) ?></td>
                    <td><?= $n['title']; ?></td>
                    <td><input type="checkbox" name="sh[]" value="<?=$n['id'];?>" <?=($n['sh']==1)?"checked":"";?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$n['id'];?>"></td>
                    <td><input type="hidden" name="id[]" value="<?=$n['id'];?>"></td>
                <?php 
            $start++;
            } ?>
                </tr>
        </table>
        <?php
        echo "<a href='?do=news&p=$prev'> < </a>";
    for($i=1;$i<=$pages;$i++){
    $font=($now==$i)?"30px":"20px";
        echo "<a href='?do=news&p=$i' style='font-size:$font'>$i</a>";
    }
    echo "<a href='?do=news&p=$next'> > </a>";
        ?>
        <div class="ct"><button>確定修改</button></div>
    </form>