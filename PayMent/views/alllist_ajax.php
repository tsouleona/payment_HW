<?php 
    $ID = $DATA[0];
    $ROW = $DATA[1];
    $TOTAL = $DATA[2];
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
            href="<?php echo $ROOT?>Index/check">
            <button  class="btn btn-primary btn-lg" >回首頁</button></a>
            <a style="color:#FFF" 
            href="<?php echo $ROOT?>Outcome/outcomeView?ID=<?php echo $ID;?>">
            <button  class="btn btn-primary btn-lg" >出款</button></a>
            <a style="color:#FFF" 
            href="<?php echo $ROOT?>Income/incomeView?ID=<?php echo $ID;?>">
            <button  class="btn btn-primary btn-lg" >入款</button></a>
        </div>
    </div>
</div>
<div class="row" align="center">
    <div class="container">
            <table class="table table-hover">
                <thead>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;時間</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp;項目</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;交易名目</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;金額</font></strong></h4>
                    </td>
                    <?php 
                        $X = count($ROW);
                        for($I=0;$I<$X;$I++){
                    ?>
                    <tr>
                        <td align="center">
                           <h4><?php echo $ROW[$I]['date'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $ROW[$I]['Item'];?></h4>
                        </td>
                        <td align="center">
                           <h4><?php echo $ROW[$I]['data'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $ROW[$I]['Money'];?></h4>
                        </td>
                        
                    </tr>
                    <?php }?>
                            
            </table>
    </div>
</div>        
