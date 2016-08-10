<?php
    $user_id = $data[0];
    $row = $data[1];
    $connect = new Config();
    $root = $connect->root();
?>
<div class="row" align="center">
    <div class="container">
        <div class="row" style="width:600;background:#ffaab8;border:2px #ffaab8 solid;border-radius:10px">
            <h4 style="color:#FFF"><strong><?php echo $user_id;?>歡迎光臨!!</strong></h4>
            <a style="color:#FFF"href="<?php echo $root?>Index/indexView">
                <button  class="btn btn-primary btn-lg" >回首頁</button>
            </a>
            <a style="color:#FFF"href="<?php echo $root?>Expense/expenseView?user_id=<?php echo $user_id;?>">
                <button  class="btn btn-primary btn-lg" >出款</button>
            </a>
            <a style="color:#FFF"href="<?php echo $root?>Deposit/depositView?user_id=<?php echo $user_id;?>">
                <button  class="btn btn-primary btn-lg" >入款</button>
            </a>
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
                   <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;本次交易金額</font></strong></h4>
                </td>
                <td align="center">
                   <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;本次交易餘額</font></strong></h4>
                </td>
                <td align="center">
                   <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;備註</font></strong></h4>
                </td>
            </thead>
                <?php
                    $x = count($row);
                    for($i = 0 ; $i < $x ; $i++)
                    {
                ?>
                    <tr>
                        <td align="center">
                           <h4><?php echo $row[$i]['date'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $row[$i]['amount'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $row[$i]['balance'];?></h4>
                        </td>
                        <td align="center">
                           <h4><?php echo $row[$i]['memo'];?></h4>
                        </td>
                    </tr>
                <?php }?>
        </table>
    </div>
</div>
