<?php
    $user_id = $data[0];
    $balance = $data[1];
    $connect = new Config();
    $root = $connect->root();
?>
<div class="row" align="center">
    <div class="container">
        <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
            <h4 style="color:#FFF"><strong><?php echo $user_id;?>歡迎光臨!!</strong></h4>
            <h4 style="color:#FFF"><strong>您的餘額為 $<?php echo $balance;?></strong></h4>
            <a style="color:#FFF"href="<?php echo $root?>Expense/expenseView?user_id=<?php echo $user_id;?>">
                <button  class="btn btn-primary btn-lg" >出款</button>
            </a>
            <a style="color:#FFF"href="<?php echo $root?>Entry/entryView?user_id=<?php echo $user_id;?>">
                <button  class="btn btn-primary btn-lg" >查詢明細</button>
            </a>
        </div>
    </div>
</div>