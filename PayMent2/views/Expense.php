<html lang="en">
<?php
    $connect = new Config();
    $root = $connect->root();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Payment</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $root;?>views/css/bootstrap.css" rel="stylesheet">

    <!-- Jquery-->
    <script src="<?php echo $root;?>views/jquery/jquery.js"></script>

</head>
<body>
    <?php
        $userId = $data[0];
    ?>
    <br><br><br>
    <div class="row" align="center">
        <div class="container">
            <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
                <div class="form-group">
                    <input style="visibility:hidden" value="<?php echo $userId;?>" id="userId" />

                    <h4 style="color:#FFF"><strong>請輸入出款金額</strong></h4>
                    <input type="text" class="form-control" id="expenseAmount" />

                    <h4 style="color:#FFF"><strong>備註</strong></h4>
                    <input type="text" class="form-control" id="expenseMemo" />
                </div>
                <a style="color:#FFF" href="<?php echo $root;?>Index/indexView" >
                    <button id="ok" class="btn btn-primary btn-lg">回首頁</button>
                </a>
                <button id="expenseOk" class="btn btn-primary btn-lg">確認</button>
            </div>
        </div>
    </div>
    <hr>
    <div id="expenseOp"></div>
    <script>
        $("#expenseOk").on("click",function ()
        {
            if (!isNaN($("#expenseAmount").val()))
            {
                if ($("#expenseAmount").val()=="") {
                    $("#expenseOp").html('<h3 style="color:#ff5d79"><strong>尚未輸入完整</strong></h3>');
                } else {
                    $("#expenseOp").html('<h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3>');
                    $.ajax({
                        url:'<?php echo $root;?>Expense/expenseMoney',
                        type:'POST',
                        data:{
                            userId:$("#userId").val(),
                            amount:$("#expenseAmount").val(),
                            memo:$("#expenseMemo").val()
                        },
                        datatype:'html',
                        success:function(data){
                            $("#expenseOp").html(data);
                        }
                    });
                }
            } else {
                $("#expenseop").html('<h3 style="color:#ff5d79"><strong>出款金額只能輸入數字</strong></h3>');
            }
        });
    </script>

    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>