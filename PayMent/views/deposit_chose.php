<?php
    $id = $data[0];
    $total = $data[1];
?>
<?php
    $connect = new connect_db();
    $root = $connect->db();
?>
<div class="row" align="center">
    <div class="container">
        <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
            <h4 style="color:#FFF"><strong><?php echo $id;?>歡迎光臨!!</strong></h4>
            <h4 style="color:#FFF"><strong>您的餘額為 $<?php echo $total;?></strong></h4>
            <a style="color:#FFF"
            href="<?php echo $root?>Expence/expenceView?ID=<?php echo $id;?>">
            <button  class="btn btn-primary btn-lg" >出款</button></a>
            <a style="color:#FFF"
            href="<?php echo $root?>Entry/entryView?ID=<?php echo $id;?>">
            <button  class="btn btn-primary btn-lg" >查詢明細</button></a>
        </div>
    </div>
</div>