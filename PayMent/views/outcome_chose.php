<?php 
    $ID = $DATA[0];
    $TOTAL = $DATA[1];
?>
<?php 
    $CONNECT = new connect_db();
    $ROOT = $CONNECT->db();
?>
<div class="row" align="center">
    <div class="container">
        <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
            <h4 style="color:#FFF"><strong><?php echo $ID;?>歡迎光臨!!</strong></h4>
            <h4 style="color:#FFF"><strong>您的餘額為 $<?php echo $TOTAL;?></strong></h4>
            <a style="color:#FFF" 
            href="<?php echo $ROOT?>Income/incomeView?ID=<?php echo $ID;?>">
            <button  class="btn btn-primary btn-lg" >入款</button></a>
            <a style="color:#FFF" 
            href="<?php echo $ROOT?>AllList/allListView?ID=<?php echo $ID;?>">
            <button  class="btn btn-primary btn-lg" >查詢明細</button></a>
        </div>
    </div>
</div>