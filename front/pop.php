<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="25%">標題</td>
            <td wi25h="55%">內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $now = $_GET['p'] ?? "1";
        $start = ($now - 1) * $div;
        $pages = ceil($total / $div);
        $news = $News->all(['sh' => 1], " ORDER BY good DESC LIMIT $start,$div");
        foreach ($news as $n) {
        ?>
            <tr>
                <td><?= $n['title']; ?></td>
                <td class="change">
                    <div class="part"><?= mb_substr($n['text'], 0, 20, "utf8"); ?></div>
                    <div class="alerr" style="display:none"><?= nl2br($n['text']); ?></div>

                </td>
                <td><?= $n['good']; ?>個人說<img src="icon/02B03.jpg" style="width:30px">
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
    for ($i = 1; $i <= $pages; $i++) {
        $font = ($now == $i) ? "30px" : "20px";
        echo "<a href='?do=pop&p=$i' style='font-size:$font'>$i</a>";
    }
    ?>
</fieldset>
<script>
    $(".change").hover(function() {

        $(this).children(".alerr").toggle();
    })
</script>