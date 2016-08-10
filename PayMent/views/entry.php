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
    <?php
        $user_id = $data[0];
    ?>
    <input style="visibility:hidden" value="<?php echo $user_id;?>" id="user_id" />
    <br><br><br>
    <div id="alllist"><h3 style="color:#ff5d79"><strong>請稍後將為您服務</strong></h3></div>
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
                    user_id:$("#user_id").val()
                },
                datatype:'html',
                success:function(data){
                    $("#alllist").html(data);
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