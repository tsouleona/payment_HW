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
        echo $DATA[0];
          
    ?>
    <!-- Bootstrap Core js -->
    <script src="<?php echo $ROOT;?>views/js/bootstrap.js"></script>
</body>
</html>