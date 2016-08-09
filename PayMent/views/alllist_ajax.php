<?php 
    $id = $data[0];
    $row = $data[1];
    $total = $data[2];
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
            href="<?php echo $root?>Index/check">
            <button  class="btn btn-primary btn-lg" >回首頁</button></a>
            <a style="color:#FFF" 
            href="<?php echo $root?>Outcome/outcomeView?ID=<?php echo $id;?>">
            <button  class="btn btn-primary btn-lg" >出款</button></a>
            <a style="color:#FFF" 
            href="<?php echo $root?>Income/incomeView?ID=<?php echo $id;?>">
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
                        $x = count($row);
                        for($i=0;$i<$x;$i++){
                    ?>
                    <tr>
                        <td align="center">
                           <h4><?php echo $row[$i]['date'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $row[$i]['Item'];?></h4>
                        </td>
                        <td align="center">
                           <h4><?php echo $row[$i]['data'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $row[$i]['Money'];?></h4>
                        </td>
                        
                    </tr>
                    <?php }?>
                            
            </table>
    </div>
</div>        
