<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td width="25%">標題</td>
            <td wi25h="55%">內容</td>
            <td></td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $now = $_GET['p'] ?? "1";
        $start = ($now - 1) * $div;
$pages=ceil($total/$div);
$prev=(($now-1)>0)?($now-1):1;
$next=(($now+1)<=$pages)?($now+1):$pages;
        $news = $News->all(['sh' => 1], " LIMIT $start,$div");
        foreach ($news as $n) {
        ?>
            <tr>
                <td><?= $n['title']; ?></td>
                <td class="change">
                    <div class="part"><?= mb_substr($n['text'], 0, 20, "utf8"); ?></div>
                    <div class="all" style="display:none"><?= nl2br($n['text']); ?></div>

                </td>
                <td>
                    <?php
                    if (!empty($_SESSION['login'])) {
                        $chk = $Log->find(['user' => $_SESSION['login'], 'news' => $n['id']]);
                        if ($chk == 0) {
                    ?>
                            <a href="#" id="good<?= $n['id']; ?>" onclick="good('<?= $n['id']; ?>','1','<?= $_SESSION['login']; ?>')">讚</a>
                        <?php
                        } else {
                        ?>
                            <a href="#" id="good<?= $n['id']; ?>" onclick="good('<?= $n['id']; ?>','2','<?= $_SESSION['login']; ?>')">收回讚</a>
                    <?php
                        }
                    }
                    ?>
                </td>
            <?php } ?>
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
</fieldset>
<script>
    $(".change").on("click", function() {
        // console.log(this);
        $(this).children(".part,.all").toggle();
    })
</script>