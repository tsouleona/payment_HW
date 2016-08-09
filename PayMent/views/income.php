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
    <?php 
        $ID = $DATA[0];
    ?>
    <br><br><br>
    <div class="row" align="center">
        <div class="container">
            <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
                <div class="form-group">
                    <input style="visibility:hidden" value="<?php echo $ID;?>" id="Userid" />
                    
                    <h4 style="color:#FFF"><strong>請輸入入款金額</strong></h4>
                    <input type="text" class="form-control" id="inmoney" />
                    
                    <h4 style="color:#FFF"><strong>入款說明</strong></h4>
                    <input type="text" class="form-control" id="indata" />
                </div>
                <a style="color:#FFF" href="<?php echo $ROOT?>Index/check" ><button id="ok" class="btn btn-primary btn-lg">回首頁</button></a>
                <button id="incomeok" class="btn btn-primary btn-lg">確認</button>
            </div>
        </div>
    </div>
    <hr> 
    <div id="incomeop"></div>
    <script>
        $("#incomeok").on("click",function(){
           
            if ($("#inmoney").val()=="" || $("#outdata").val()=="")
            {
                $("#incomeop").html('<h3 style="color:#ff5d79"><strong>尚未輸入完整</strong></h3>');
            }else {
                $("#incomeop").html('<h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3>');
                $.ajax({
                    url:'<?php echo $ROOT;?>Income/incomeMoney',
                    type:'POST',
                    data:{
                        ID:$("#Userid").val(), 
                        outmoney:$("#inmoney").val(), 
                        outdata:$("#indata").val()
                    },
                    datatype:'html',
                    success:function(data){
                        
                        $("#incomeop").html(data);
                    }
                })
            }
            
            
            
        });
        
    </script>
    
    
    <!-- Bootstrap Core js -->
    <script src="<?php echo $ROOT;?>views/js/bootstrap.js"></script>
</body>
</html>