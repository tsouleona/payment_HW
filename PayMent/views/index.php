<html lang="en">
<?php
    $connect = new Config();
    $root = $connect->root();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PayMent</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $root;?>views/css/bootstrap.css" rel="stylesheet">

    <!-- Jquery-->
    <script src="<?php echo $root;?>views/jquery/jquery.js"></script>

</head>
<body>
    <br><br><br>
    <div class="row" align="center">
        <div class="container">
            <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
                <div class="form-group">
                <h3 style="color:#FFF"><strong>請輸入帳號</strong></h3>
                <input type="text" class="form-control" id="user_id" />
                </div>
                <button id="ok" class="btn btn-primary btn-lg">確認</button>
            </div>
        </div>
    </div>
    <hr>
    <div id="index_view"></div>
    <script>
    $("#ok").on("click",function ()
    {
        $("#index_view").html('<h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3>');
        $.ajax({
            url:'<?php echo $root;?>Index/checkId',
            type:'POST',
            data:{user_id:$("#user_id").val()},
            datatype:'html',
            success:function(data){
                $("#index_view").html(data);
            }
        })
    });
    </script>

    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>