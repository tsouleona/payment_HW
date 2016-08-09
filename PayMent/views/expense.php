<html lang="en">
<?php
    $connect = new connect_db();
    $root = $connect->db();
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
    <?php
        $user_id = $data[0];
    ?>
    <br><br><br>
    <div class="row" align="center">
        <div class="container">
            <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
                <div class="form-group">
                    <input style="visibility:hidden" value="<?php echo $user_id;?>" id="user_id" />

                    <h4 style="color:#FFF"><strong>請輸入出款金額</strong></h4>
                    <input type="text" class="form-control" id="expense_amount" />

                    <h4 style="color:#FFF"><strong>出款說明</strong></h4>
                    <input type="text" class="form-control" id="expense_memo" />
                </div>
                <a style="color:#FFF" href="<?php echo $root;?>Index/checkId" ><button id="ok" class="btn btn-primary btn-lg">回首頁</button></a>
                <button id="expenseok" class="btn btn-primary btn-lg">確認</button>
            </div>
        </div>
    </div>
    <hr>
    <div id="expenseop"></div>
    <script>
        $("#expenseok").on("click",function(){

            if ($("#expense_amount").val()=="" || $("#outdata").val()=="")
            {
                $("#expenseop").html('<h3 style="color:#ff5d79"><strong>尚未輸入完整</strong></h3>');
            }else {
                $("#expenseop").html('<h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3>');
                $.ajax({
                    url:'<?php echo $root;?>Expense/expenseMoney',
                    type:'POST',
                    data:{
                        user_id:$("#Userid").val(),
                        amount:$("#expense_amount").val(),
                        memo:$("#expense_memo").val()
                    },
                    datatype:'html',
                    success:function(data){

                        $("#expenseop").html(data);
                    }
                })
            }



        });

    </script>


    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>