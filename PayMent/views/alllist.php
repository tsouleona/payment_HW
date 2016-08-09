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
    <input style="visibility:hidden" value="<?php echo $ID;?>" id="Userid" />
    <br><br><br>
    <div id="alllist"><h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3></div>         
    <script>
    var poll = function(){
        $.ajax({
            url:'<?php echo $ROOT;?>AllList/allList',
            type:'POST',
            data:
            {
                ID:$("#Userid").val()
            },
            datatype:'html',
            success:function(data){
                
                $("#alllist").html(data);
            }
        });
    }
    setInterval(poll, 3000);
    </script> 
    <!-- Bootstrap Core js -->
    <script src="<?php echo $ROOT;?>views/js/bootstrap.js"></script>
</body>
</html>