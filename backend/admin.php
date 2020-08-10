<form action="api/deladmin.php" method="post">
    <fieldset>
        <legend>帳號管理</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
    
        <?php 
    $admins = $Admin->all();
    foreach($admins as $a){
        if($a!='admin'){
        ?>
        <tr>
            <td><?=$a['acc'];?></td>
            <td><?=$a['pw'];?></td>
            <td><input type="checkbox" name="del[]" value="<?=$a['id'];?>"></td>
        </tr>
        <?php }} ?>
    </table>
    <div class="ct"><button>確定刪除</button><button type="reset">清空選取</button></div>
</form>

    <form action="api/regadmin.php" method="post">
    <fieldset>
        <legend>新增</legend>
        *請設定您要註冊的帳號及密碼（最長12個字元）<br>
        Step1:登入帳號<input type="text" name="acc"><br>
        Step2:登入密碼<input type="password" name="pw"><br>
        Step3:再次確認密碼<input type="password" name="pw2"><br>
        Step4:信箱(忘記密碼時使用)<input type="text" name="email"><br>
        <button>新增</button><button type="reset">清除</button>
    </fieldset>
</form>  
</fieldset>