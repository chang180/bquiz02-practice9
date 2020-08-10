<h3>目前位置：首頁>分類網誌><span id="head"></span></h3>
<div class="contain" style="display:flex;justify-content:center;">
<fieldset style="width:30%">
<legend>分類網誌</legend>
<div onclick="getList(1)" id="1">健康新知</div>
<div onclick="getList(2)" id="2">菸害防制</div>
<div onclick="getList(3)" id="3">癌症防治</div>
<div onclick="getList(4)" id="4">慢性病防治</div>
</fieldset>
<fieldset style="width:50%">
<legend>分類網誌</legend>
<div id="list"></div>
</fieldset>
</div>
<script>
    getList(1);
    function getList(list){
        $("#head").text($("#"+list).text());
        $.get("api/getlist.php",{list},function(res){
            $("#list").html(res);
        })
    }
    function getPost(id){
        $.get("api/getpost.php",{id},function(res){
            $("#list").html(res);
        })
    }
</script>