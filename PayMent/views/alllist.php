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
        $id = $data[0];
    ?>
    <input style="visibility:hidden" value="<?php echo $id;?>" id="Userid" />
    <br><br><br>
    <div id="alllist"><h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3></div>         
    <script>
    var poll = function(){
        $.ajax({
            url:'<?php echo $root;?>AllList/allList',
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
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>