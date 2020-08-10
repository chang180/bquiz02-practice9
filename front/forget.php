請輸入信箱以查詢密碼<br>
<input type="text" name="email" id="email"><br>
<div class="info"></div>
<button id="search">尋找</button>
<script>
    $("#search").on("click",function(){
        $.get("api/chkemail.php",{"email":$("#email").val()},function(res){
            $(".info").text(res);
        })
    })
</script>