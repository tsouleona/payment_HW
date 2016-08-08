<html lang="en">
<?php 
    $CONNECT = new connect_db();
    $ROOT = $CONNECT->db();
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PayMent</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $ROOT;?>views/css/bootstrap.css" rel="stylesheet">
    
    <!-- Jquery-->
    <script src="<?php echo $ROOT;?>views/jquery/jquery.js"></script>
    
</head>
<body>
    <br><br><br>
    <div class="row" align="center">
        <div class="container">
            <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
                <div class="form-group">
                <h3 style="color:#FFF"><strong>請輸入帳號</strong></h3>
                <input type="text" class="form-control" id="Userid" />
                </div>
                <button id="ok" class="btn btn-primary btn-lg">確認</button>
            </div>
        </div>
    </div>
    <hr>
    <div id="options"></div>
    <script>
        $("#ok").on("click",function(){
            $("#options").html('<h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3>');
            $.ajax({
                url:'<?php echo $ROOT;?>Index/options',
                type:'POST',
                data:{ID:$("#Userid").val()},
                datatype:'html',
                success:function(data){
                    
                    $("#options").html(data);
                }
            })
        });
        
    </script>
    
    
    <!-- Bootstrap Core js -->
    <script src="<?php echo $ROOT;?>views/js/bootstrap.js"></script>
</body>
</html>