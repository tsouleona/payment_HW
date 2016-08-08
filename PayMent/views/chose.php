<?php $ROW = $DATA[0];?>
<div class="row" align="center">
    <div class="container">
        <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
            <h4 style="color:#FFF"><strong><?php echo $ROW[0]['User_ID'];?>歡迎光臨!!</strong></h4>
            <h4 style="color:#FFF"><strong>您的餘額為 $<?php echo $ROW[0]['User_Total'];?></strong></h4>
            <button  class="btn btn-primary btn-lg" >
            <a style="color:#FFF" href="<?php echo $ROOT?>Outcome/outcomeView?ID=<?php echo $ROW[0]['User_ID'];?>">
            </a>出款</button>
            <button  class="btn btn-primary btn-lg" ><a></a>入款</button>
            <button  class="btn btn-primary btn-lg" ><a></a>查詢明細</button>
        </div>
    </div>
</div>