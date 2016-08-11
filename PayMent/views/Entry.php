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
    <input style="visibility:hidden" value="<?php echo $userId;?>" id="userId" />
    <br><br><br>
    <div id="allList"><h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3></div>
    <script>
    $(document).ready(function ()
    {
        var poll = function ()
        {
            $.ajax({
                url:'<?php echo $root;?>Entry/entry',
                type:'POST',
                data:
                {
                    userId:$("#userId").val()
                },
                datatype:'html',
                success:function(data){
                    $("#allList").html(data);
                }
            });
        }
        setInterval(poll, 3000);
     });
    </script>

    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>